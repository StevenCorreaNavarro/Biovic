<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\servicio;
use App\Models\nombreEquipo;
use App\Models\tecPredo;
use App\Models\codEcri;
use App\Models\claRiesgo;
use App\Models\claBiome;
use App\Models\claUso;
use App\Models\formaAdqui;
use App\Models\propiedad;
use App\Models\magFuenAlimen;
use App\Models\magVol;
use App\Models\equipo;
use App\Models\hojadevida;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;


use Barryvdh\DomPDF\Facade\Pdf as PDF; // ingresar pdf


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class MantoCronoController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Mostrar vista simple de hoja de vida (ver)
     */
    public function verhojadevida()
    {
        return view('hoja_ver');
    }

    /**
     * Listar vista de inventario
     */
    public function listar_inventario()
    {
        return view('inventario');
    }

    /**
     * Listar vista alarma & calibración
     */
    public function listar_alarma()
    {
        return view('alarma_calibracion');
    }

    /**
     * Mostrar cronograma filtrado por propiedad (search)
     * - Eager loading para evitar N+1
     * - Paginación para rendimiento
     */
    public function propiedad(Request $request)
    {
        // Eager load: ajusta los nombres de relación si en tu modelo son otros
        $query = hojadevida::with(['propiedad','ubifisica','equipo','marca','modelo']);

        // Lista para datalist
        $propiedads = propiedad::select('id','nombreempresa')->orderBy('nombreempresa')->get();

        // Filtrado por propiedad (search)
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('propiedad', function ($q) use ($search) {
                $q->where('nombreempresa', 'LIKE', "%{$search}%");
            });
        }

        // Paginación (ajusta el valor si lo deseas)
        $hdvs = $query->orderBy('id', 'desc')->paginate(50);

        return view('manto_crono', compact('hdvs','propiedads'));
    }

    /**
     * Página con tabla vacía (solo búsqueda)
     */
    public function propiedadbuscar()
    {
        $hdvs = hojadevida::whereRaw('0 = 1')->get(); // colección vacía
        $propiedads = propiedad::select('id','nombreempresa')->orderBy('nombreempresa')->get();

        return view('manto_crono', compact('hdvs','propiedads'));
    }

     public function semaforo(Request $request)
    {
        // Eager load: ajusta los nombres de relación si en tu modelo son otros
        $query = hojadevida::with(['propiedad','ubifisica','equipo','marca','modelo']);

        // Lista para datalist
        $propiedades = propiedad::select('id','nombreempresa')->orderBy('nombreempresa')->get();

        // Filtrado por propiedad (search)
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('propiedad', function ($q) use ($search) {
                $q->where('nombreempresa', 'LIKE', "%{$search}%");
            });
        }

        // Paginación (ajusta el valor si lo deseas)
        $hdvs = $query->orderBy('id', 'desc')->paginate(50);

        return view('Semaforo_crono_cal', compact('hdvs','propiedades'));
    }

    /**
     * Listar todos (sin paginar)
     */
    public function listar()
    {
        $hdvs = hojadevida::with(['propiedad','ubifisica','equipo','marca','modelo'])->orderBy('id', 'desc')->get();
        return view('manto_crono', compact('hdvs'));
    }

    /**
     * Formulario para crear nueva hoja de vida / equipo
     */
    public function create()
    {
        $nombreservicios     = servicio::all();
        $nombreEquipos       = nombreEquipo::all();
        $equipos             = equipo::orderBy('nombre_equipo', 'asc')->get();
        $tecPredos           = tecPredo::all();
        $codiecri            = codEcri::all();
        $clariesgo           = claRiesgo::all();
        $clabiomedica        = claBiome::all();
        $clauso              = claUso::all();
        $formaadqui          = formaAdqui::all();
        $nombreempresa       = propiedad::all();
        $nombrealimentacion  = magFuenAlimen::all();
        $abreviacionvolumen  = magVol::all();

        return view('hojadevida.create', compact(
            'nombreEquipos',
            'nombreservicios',
            'tecPredos',
            'codiecri',
            'clariesgo',
            'clabiomedica',
            'clauso',
            'formaadqui',
            'equipos',
            'nombreempresa',
            'nombrealimentacion',
            'abreviacionvolumen'
        ));
    }

    /**
     * Metodo AJAX: marca/desmarca en bloque una columna de mes para un conjunto de ids
     * Espera: { month: 'enero', ids: [1,2,3], value: 'X' | '' }
     */
    public function bulkMark(Request $request)
    {
        $request->validate([
            'month' => 'required|string|in:enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre',
            'ids'   => 'required|array',
            'ids.*' => 'integer',
            'value' => 'nullable|string'
        ]);

        $month = $request->month;
        $ids   = $request->ids;
        // en BD guardamos 'X' para marcado; NULL para desmarcar
        $value = $request->value === 'X' ? 'X' : null;

        // evitar updates enormes en una sola query
        $chunks = array_chunk($ids, 500);

        DB::beginTransaction();
        try {
            foreach ($chunks as $chunk) {
                hojadevida::whereIn('id', $chunk)->update([$month => $value]);
            }

            // registro en tabla audit_log si existe (opcional)
            if (Schema::hasTable('audit_log')) {
                DB::table('audit_log')->insert([
                    'user_id'    => auth()->id() ?? null,
                    'action'     => 'bulk_mark_month',
                    'table_name' => 'hojadevida',
                    'record_id'  => null,
                    'meta'       => json_encode(['month' => $month, 'count' => count($ids), 'value' => $value]),
                    'created_at' => now(),
                ]);
            }

            DB::commit();
            return response()->json(['ok' => true], 200);
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('MantoCrono bulkMark error: ' . $e->getMessage());
            return response()->json(['ok' => false, 'message' => 'Error al actualizar registros.'], 500);
        }
    }

    public function downloadPdfLetter(Request $request)
        {
            // Obtener datos (ajusta la query si tu lógica es otra)
            $query = Hojadevida::query()->orderBy('id','desc');

            if ($request->filled('search')) {
                // Si buscas por propiedad nombre (ajusta según tu modelo/relación)
                $term = $request->search;
                $query->whereHas('propiedad', function ($q) use ($term) {
                    $q->where('nombreempresa', 'like', "%{$term}%");
                });
            }

            $hdvs = $query->get();

            $pdf = PDF::loadView('manto_crono_pdf', compact('hdvs'))
                    ->setPaper('letter', 'portrait');

            return $pdf->download('cronograma_letter_portrait.pdf');
        }

        /**
         * Descargar PDF tamaño carta (landscape)
         */
       public function downloadPdfLetterPortrait(Request $request)
            {
                $query = Hojadevida::query()->orderBy('id','desc');
                if ($request->filled('search')) {
                    $term = $request->search;
                    $query->whereHas('propiedad', function($q) use ($term) {
                        $q->where('nombreempresa','like',"%{$term}%");
                    });
                }
                $hdvs = $query->get();

                $pdf = PDF::loadView('manto_crono_pdf', compact('hdvs'))
                        ->setPaper('letter', 'portrait');

                return $pdf->download('cronograma_letter_portrait.pdf');
            }

       public function downloadPdfLetterLandscape(Request $request)
            {
                $query = Hojadevida::query()->orderBy('id','desc');
                if ($request->filled('search')) {
                    $term = $request->search;
                    $query->whereHas('propiedad', function($q) use ($term) {
                        $q->where('nombreempresa','like',"%{$term}%");
                    });
                }
                $hdvs = $query->get();

                $pdf = PDF::loadView('manto_crono_pdf', compact('hdvs'))
                        ->setPaper('letter', 'landscape');

                return $pdf->download('cronograma de mantenimiento.pdf');
            }



}
