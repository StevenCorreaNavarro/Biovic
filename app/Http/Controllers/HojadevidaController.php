<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\estadoequipo;
use App\Models\servicio;
use App\Models\nombreEquipo;
use App\Models\Ubifisica;
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
use App\Models\magFre;
use App\Models\magFuenAli;
use App\Models\magCorriente;
use App\Models\magPeso;
use App\Models\magPre;
use App\Models\MagPot;
use App\Models\magTemp;
use App\Models\magDimension;
use App\Models\magVel;
use App\Models\accesorio;
use App\Models\fabricante;
use App\Models\proveedor;
use App\Models\user;
use App\Models\hojadevida;
use App\Models\Marca;
use App\Models\Modelo;
// use App\Models\

use Illuminate\Http\Request;

use Dompdf\Dompdf;
use Dompdf\Options;
use Carbon\Carbon;

/**
 * Controlador principal para gestionar las hojas de vida (HV) de equipos biomédicos.
 * Contiene métodos para:
 *  - listar y buscar (mostrarbusqueda)
 *  - ver detalle (show)
 *  - crear/guardar (create, store, stores)
 *  - generar PDF por ID (downloadPDF)
 *
 * NOTA: Se dejó la lógica original de creación de relaciones/creación de entidades auxiliares
 * (ej. crear nueva propiedad, servicio, etc.) para no romper la funcionalidad existente.
 */
class HojadevidaController extends Controller
{
    /**
     * Genera y devuelve un PDF (stream) de la hoja de vida indicada por $id.
     * Usa Dompdf con isRemoteEnabled para permitir imágenes remotas.
     */
    public function downloadPDF($id)
    {
        $hdvs = Hojadevida::findOrFail($id);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true); // Permite cargar imágenes remotas
        $pdf = new Dompdf($options);

        // Renderiza la vista 'hojadevida.showpdf' con los datos y genera el PDF
        $pdf->loadHtml(view('hojadevida.showpdf', compact('hdvs'))->render());
        $pdf->setPaper('A4', 'portrait'); // A4 vertical
        $pdf->render();

        return $pdf->stream('documento.pdf');
    }

    /**
     * Listado principal de hojas de vida.
     * - Soporta búsqueda básica por 'search' (equipo.nombre_equipo, serie, actFijo o propiedad.nombreempresa).
     * - Retorna la vista 'hojadevida.listar' con la colección $hdvs.
     */
    public function listar(Request $request)
    {
        // Query base con relaciones utilizadas en la vista
        $query = Hojadevida::with('equipo', 'servicio', 'propiedad',);

        if ($request->has('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                // Busca en la relación equipo y en la relación propiedad
                $q->whereHas('equipo', function ($eq) use ($search) {
                    $eq->where('nombre_equipo', 'LIKE', "%$search%")
                        ->orWhere('serie', 'LIKE', "%$search%")
                        ->orWhere('codigo', 'LIKE', "%$search%")
                        // ->orWhere('name', 'LIKE', "%$search%")
                        ->orWhere('actFijo', 'LIKE', "%$search%");
                })
                    ->orWhereHas('propiedad', function ($p) use ($search) {
                        $p->where('nombreempresa', 'LIKE', "%$search%");
                    })
                    ->orWhereHas('user', function ($p) use ($search) {
                        $p->where('name', 'LIKE', "%$search%")
                            ->orWhere('codigo', 'LIKE', "%$search%")
                            ->orWhere('contact', 'LIKE', "%$search%");
                    });
            });
        }

        $hdvs = $query->orderBy('id', 'desc')->get();

        return view('hojadevida.listar', compact('hdvs'));
    }

    /**
     * Buscar/mostrar resultados (ruta que pediste: mostrarbusqueda).
     * Hace búsqueda de texto libre (serie, actFijo, id, equipo, servicio, propiedad).
     * Retorna la misma vista de listado con resultados filtrados.
     */
    public function mostrarbusqueda(Request $request)
    {
        $q = trim($request->input('search', ''));

        // Query base con relaciones que usa la vista
        $query = hojadevida::with(['equipo', 'servicio', 'propiedad', 'marca', 'modelo', 'ubifisica', 'user']);

        if ($q !== '') {
            $query->where(function ($wr) use ($q) {

                $wr->where('serie', 'LIKE', "%{$q}%")
                    ->orWhere('actFijo', 'LIKE', "%{$q}%")
                    ->orWhere('codigo', 'LIKE', "%{$q}%")
                    ->orWhere('id', $q)
                    ->orWhereHas('equipo', function ($qe) use ($q) {
                        $qe->where('nombre_equipo', 'LIKE', "%{$q}%");
                    })
                    ->orWhereHas('servicio', function ($qs) use ($q) {
                        $qs->where('nombreservicio', 'LIKE', "%{$q}%");
                    })

                    ->orWhereHas('propiedad', function ($qp) use ($q) {
                        $qp->where('nombreempresa', 'LIKE', "%{$q}%");
                    })
                    ->orWhereHas('user', function ($tr) use ($q) {
                        $tr->where('codigo', 'LIKE', "%$q%");
                        // ->orWhere('codigo', 'LIKE', "%$$q%")
                        // ->orWhere('contact', 'LIKE', "%$$q%")
                    });
            });
        }

        $hdvs = $query->orderBy('id', 'desc')->get();

        // Si la petición espera JSON (ej. llamada AJAX) devolvemos JSON
        if ($request->wantsJson()) {
            return response()->json($hdvs);
        }

        
        if (!$request->has('search')) {
            // Si no hay parámetro de búsqueda, redirige
            return redirect()->route('hoja_ver'); // o a donde quieras
        }



        // Por defecto, retornamos la vista de listado con el término de búsqueda $q (si se usa en la vista)
        return view('hojadevida.mostrarbusqueda', compact('hdvs', 'q'));
    }
    public function edituser(User $user)
    {

        return view('users.useredit', compact('user'));
    }
    /**
     * Devuelve el HTML parcial (partial) con la hoja de vida para inyectar en el modal. ingresadi 3/09/2025
     */
    public function fetch($id)
    {
        // Cargar relaciones que realmente existen en el modelo 'hojadevida'
        $hdvs = Hojadevida::with([
            'equipo',
            'marca',
            'modelo',
            'servicio',
            'propiedad',
            'ubifisica',
            'estadoequipo',
            'nombreEquipo',   // si lo usas en la vista
            'tecPredo',
            'codEcri',
            'claRiesgo',
            'claBiome',
            'ClaUso',         // el nombre que tienes en el modelo (PHP es case-insensitive)
            'formaAdqui',

            // relaciones técnicas (usar los nombres tal como las definiste en el modelo)
            'magFuenAlimen',
            'magFre',
            'magFuenAli',
            'magCorriente',
            'magPeso',
            'magPre',
            'magPot',
            'magTemp',
            'magVel',
            'magDimension',

            // accesorios / fabricantes / proveedores
            'accesorio',
            'fabricante',
            'proveedor',

        ])->findOrFail($id);

        // Renderiza el partial (o la vista completa si así lo deseas)
        $html = view('hojadevida.showpdf', compact('hdvs'))->render();

        return response()->json(['html' => $html]);
    }


    /**
     * Muestra la paginación simple (no usada en la lista principal, mantenida por compatibilidad).
     */
    public function index()
    {
        $datos['hojadevida'] = Hojadevida::paginate(10);
        return view('hojadevida.index', $datos);
    }

    /**
     * Método auxiliar que redirige a la vista de creación (mantener por compatibilidad).
     */
    public function creates()
    {
        return view('hojadevida.create');
    }

    /**
     * Muestra el formulario para crear una nueva Hoja de Vida.
     * Carga colecciones que se necesitan en selects del formulario (servicios, equipos, marcas, etc.).
     */
    public function create()
    {
        // Cargar catálogos/relaciones necesarias para el formulario de creación
        $nombreservicios = Servicio::all();
        $nombreEquipos = NombreEquipo::all();
        $equipos = Equipo::orderBy('nombre_equipo', 'asc')->get();

        $estadoequipo = estadoequipo::all();
        $ubifisicas = Ubifisica::all();
        $tecPredos = TecPredo::all();
        $clariesgo = Clariesgo::all();
        $clabiomedica = ClaBiome::all();
        $clauso = ClaUso::all();
        $codiecri = codEcri::all();
        $formaadqui = Formaadqui::all();
        $propiedad = Propiedad::all();

        $nombrealimentacion = magFuenAlimen::all();
        $abreviacionvolumen = magVol::all();
        $magFrec = magFre::all();
        $fuentesAli = magFuenAli::all();
        $corrientes = magCorriente::all();
        $pesos = magPeso::all();
        $presiones = magPre::all();
        $potencias = MagPot::all();
        $temperaturas = MagTemp::all();
        $dimensiones  = magDimension::all();
        $velocidad = magVel::all();
        $accesorios = accesorio::all();
        $fabricantes = fabricante::all();
        $proveedores = proveedor::all();

        // Pasamos todos los catálogos que la vista pueda necesitar
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
            'propiedad',
            'nombrealimentacion',
            'abreviacionvolumen',
            'ubifisicas',
            'estadoequipo',
            'magFrec',
            'fuentesAli',
            'corrientes',
            'pesos',
            'presiones',
            'potencias',
            'temperaturas',
            'velocidad',
            'dimensiones',
            'accesorios',
            'fabricantes',
            'proveedores'
        ));
    }

    /**
     * Vista auxiliar para obtener equipos con modelos (mantener por compatibilidad).
     */
    public function stores()
    {
        $equipos = Equipo::with('modelos')->get();
        return view('hojadevida.create', compact('equipos'));
    }

    /**
     * Almacena una nueva Hoja de Vida.
     * - Valida los inputs (archivos, fechas).
     * - Crea o asigna relaciones auxiliares (estadoequipo, ubifisica, servicio, propiedad, etc.) si vienen en texto.
     * - Guarda archivos (foto, soportes) en storage/app/public y almacena la ruta en la BD.
     */
    public function store(Request $request)
    {
        // dd($request->all()); // Se pone para ver los datos que llegan del formulario
        $hdv = new Hojadevida();

        $request->validate([
            'perioMto' => 'nullable|string|max:255',
            'perioCali' => 'nullable|in:trimestre,cuatrimestre,anual',
            // Nota: 'required_if:perioCali,ANUAL' se mantiene como estaba en tu código original.
            'fechaCali' => 'required_if:perioCali,ANUAL|date|before_or_equal:today|nullable',
            'foto' => 'nullable|max:10000|mimes:jpeg,png,jpg,gif,svg',
            'soporteFactura' => 'nullable|mimes:pdf|max:10000',
            'soporteRegistroInvima' => 'nullable|mimes:pdf|max:10000',
            'soporteCertificadoCalibracion' => 'nullable|mimes:pdf|max:10000',
            'soporteManual' => 'nullable|mimes:pdf|max:10000',
            'soporteLimpiezaDesinfeccion' => 'nullable|mimes:pdf|max:10000',

        ]);

        // Cálculo de mes final según periodo de calibración (lógica original)
        if ($request->filled('fechaCali')) {
            $fecha = Carbon::parse($request->fechaCali);
        } else {
            $fecha = Carbon::now();
        }
        $tipoPeriodo = $request->perioCali;
        $mesesASumar = match ($tipoPeriodo) {
            'trimestre' => 3,
            'cuatrimestre' => 4,
            'anual' => 12,
            default => 0,
        };

        $mesFinal = $fecha->copy()->addMonths($mesesASumar)->format('F');
        $mesTraducido = $this->traducirMes(strtolower($mesFinal));

        $hdv->fechaCali = $request->fechaCali;
        $hdv->perioCali = $tipoPeriodo;

        // Si se pudo traducir el mes, marca la columna correspondiente con 'X' (mantener lógica original)
        if ($mesTraducido) {
            $hdv->$mesTraducido = 'X';
        }

        // Asignación de campos básicos/descripciones
        $hdv->equipo_id = $request->equipo_id;
        $hdv->modelo_id = $request->modelo_id;
        $hdv->marca_id = $request->marca_id;
        $hdv->serie = $request->serie;
        $hdv->codigo = $request->codigo;
        $hdv->actFijo = $request->actFijo;
        $hdv->estadoequipo_id = $request->estadoequipo_id;
        $hdv->ubifisica_id = $request->ubifisica_id;
        $hdv->servicio_id = $request->servicio_id;
        $hdv->tec_predo_id = $request->tec_predo_id;
        $hdv->regInvima = $request->regInvima;
        $hdv->cla_riesgo_id = $request->cla_riesgo_id;
        $hdv->cla_biome_id = $request->cla_biome_id;
        $hdv->cla_uso_id = $request->cla_uso_id;
        $hdv->perioMto = $request->perioMto;
        $hdv->cod_ecri_id = $request->cod_ecri_id;

        // Guardar foto (si existe) y normalizar ruta para BD
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/fotos');
            $hdv->foto = str_replace('public/', '', $path);
        }

        // Registro histórico
        $hdv->fechaAdquisicion = $request->fechaAdquisicion;
        $hdv->fechaInstalacion = $request->fechaInstalacion;
        $hdv->garantia = $request->garantia;
        $hdv->factura = $request->factura;
        $hdv->forma_adqui_id = $request->forma_adqui_id;
        $hdv->vidaUtil = $request->vidaUtil;
        $hdv->costo = $request->costo;
        $hdv->propiedad_id = $request->propiedad_id;

        // Registro técnico
        $hdv->mag_fuen_alimen_id = $request->mag_fuen_alimen_id;
        $hdv->frecuencia = $request->frecuencia;
        $hdv->mag_fre_id = $request->mag_fre_id;
        $hdv->volMax = $request->volMax;
        $hdv->volMin = $request->volMin;
        $hdv->mag_fuen_ali_id = $request->mag_fuen_ali_id;
        $hdv->corrienteMax = $request->corrienteMax;
        $hdv->corrienteMin = $request->corrienteMin;
        $hdv->mag_corriente_id = $request->mag_corriente_id;
        $hdv->peso = $request->peso;
        $hdv->mag_peso_id = $request->mag_peso_id;
        $hdv->presion = $request->presion;
        $hdv->mag_pre_id = $request->mag_pre_id;
        $hdv->temperatura = $request->temperatura;
        $hdv->mag_temp_id = $request->mag_temp_id;
        $hdv->velocidad = $request->velocidad;
        $hdv->mag_vel_id = $request->mag_vel_id;
        $hdv->humedad = $request->humedad;
        $hdv->dimLargo = $request->dimLargo;
        $hdv->dimAncho = $request->dimAncho;
        $hdv->dimAlto = $request->dimAlto;
        $hdv->mag_dimension_id = $request->mag_dimension_id;

        // $hdv->accesorio = $request->accesorio;
        $hdv->recomendaciones = $request->recomendaciones; // establece un valor por defecto si no se proporciona

        $hdv->accesorio_id = $request->accesorio_id; // accesorios mostrar
        $hdv->fabricante_id = $request->fabricante_id; // fabricante mostrar
        $hdv->proveedor_id = $request->proveedor_id; // proveedor mostrar

        // Guardar PDFs de soporte (si existen) y normalizar rutas para BD
        if ($request->hasFile('soporteFactura')) {
            $p = $request->file('soporteFactura')->store('public/soportes');
            $hdv->soporteFactura = str_replace('public/', '', $p);
        }
        if ($request->hasFile('soporteRegistroInvima')) {
            $p = $request->file('soporteRegistroInvima')->store('public/soportes');
            $hdv->soporteRegistroInvima = str_replace('public/', '', $p);
        }
        if ($request->hasFile('soporteCertificadoCalibracion')) {
            $p = $request->file('soporteCertificadoCalibracion')->store('public/soportes');
            $hdv->soporteCertificadoCalibracion = str_replace('public/', '', $p);
        }
        if ($request->hasFile('soporteManual')) {
            $p = $request->file('soporteManual')->store('public/soportes');
            $hdv->soporteManual = str_replace('public/', '', $p);
        }
        if ($request->hasFile('soporteLimpiezaDesinfeccion')) {
            $p = $request->file('soporteLimpiezaDesinfeccion')->store('public/soportes');
            $hdv->soporteLimpiezaDesinfeccion = str_replace('public/', '', $p);
        }

        // Creación/Asignación de entidades auxiliares si llegan como texto (mantengo la lógica original)
        if ($request->filled('estadoequipo')) {
            $estado = new estadoequipo();
            $estado->estadoequipo = $request->estadoequipo;
            $estado->save();
            $hdv->estadoequipo_id = $estado->id;
        } elseif ($request->filled('estadoequipo_id')) {
            $hdv->estadoequipo_id = $request->estadoequipo_id;
        }

        if ($request->filled('ubifisicas')) {
            $ubi = new ubiFisica();
            $ubi->ubicacionfisica = $request->ubifisicas;
            $ubi->save();
            $hdv->ubifisica_id = $ubi->id;
        } elseif ($request->filled('ubifisica_id')) {
            $hdv->ubifisica_id = $request->ubifisica_id;
        }
        if ($request->filled('nombreservicios')) {
            $serv = new servicio();
            $serv->nombreservicio = $request->nombreservicios;
            $serv->save();
            $hdv->servicio_id = $serv->id;
        } elseif ($request->filled('servicio_id')) {
            $hdv->servicio_id = $request->servicio_id;
        }

        if ($request->filled('tecPredos')) {
            $pre = new tecPredo();
            $pre->tecpredo = $request->tecPredos;
            $pre->save();
            $hdv->tec_predo_id = $pre->id;
        } elseif ($request->filled('tec_predo_id')) {
            $hdv->tec_predo_id = $request->tec_predo_id;
        }

        if ($request->filled('clariesgo')) {
            $rie = new clariesgo();
            $rie->clariesgo = $request->clariesgo;
            $rie->save();
            $hdv->cla_riesgo_id = $rie->id;
        } elseif ($request->filled('cla_riesgo_id')) {
            $hdv->cla_riesgo_id = $request->cla_riesgo_id;
        }

        if ($request->filled('clabiomedica')) {
            $bio = new clabiome();
            $bio->clabiomedica = $request->clabiomedica;
            $bio->save();
            $hdv->cla_biome_id = $bio->id;
        } elseif ($request->filled('cla_biome_id')) {
            $hdv->cla_biome_id = $request->cla_biome_id;
        }

        if ($request->filled('clauso')) {
            $uso = new clauso();
            $uso->clauso = $request->clauso;
            $uso->save();
            $hdv->cla_uso_id = $uso->id;
        } elseif ($request->filled('cla_uso_id')) {
            $hdv->cla_uso_id = $request->cla_uso_id;
        }

        if ($request->filled('propiedad')) {
            $pro = new propiedad();
            $pro->nombreempresa = $request->propiedad;
            $pro->nitempresa = $request->nitempresa;
            $pro->direccionempre = $request->direccionempre;
            $pro->telefonoempre = $request->telefonoempre;
            $pro->ciudadempre = $request->ciudadempre;
            $pro->sedeempresa = $request->sedeempresa;
            $pro->emailWebempre = $request->emailWebempre;
            $pro->representanteempresa = $request->representanteempresa;

            if ($request->hasFile('fotos')) {
                $file = $request->file('fotos');
                $fotoprop = time() . '_' . $file->getClientOriginalName();
                $ruta = $file->storeAs('propiedadfotos', $fotoprop, 'public');
                $pro->foto = $ruta;
            }

            $pro->save();
            $hdv->propiedad_id = $pro->id;
        } elseif ($request->filled('propiedad_id')) {
            $hdv->propiedad_id = $request->propiedad_id;
        }

        if ($request->filled('formaadqui')) {
            $adqui = new formaadqui();
            $adqui->formaadqui = $request->formaadqui;
            $adqui->save();
            $hdv->forma_adqui_id = $adqui->id;
        } elseif ($request->filled('forma_adqui_id')) {
            $hdv->forma_adqui_id = $request->forma_adqui_id;
        }

        if ($request->filled('nombrealimentacion')) {
            $fuentgali = new magFuenAlimen();
            $fuentgali->nombrealimentacion = $request->nombrealimentacion;
            $fuentgali->save();
            $hdv->mag_fuen_alimen_id = $fuentgali->id;
        } elseif ($request->filled('mag_fuen_alimen_id')) {
            $hdv->mag_fuen_alimen_id = $request->mag_fuen_alimen_id;
        }

        if ($request->filled('nombrefrecuencia')) {
            $ufre = new magFre();
            $ufre->nombrefrecuencia = $request->nombrefrecuencia;
            $ufre->abreviacionfrecuencia = $request->abreviacionfrecuencia;
            $ufre->save();
            $hdv->mag_fre_id = $ufre->id;
        } elseif ($request->filled('mag_fre_id')) {
            $hdv->mag_fre_id = $request->mag_fre_id;
        }

        if ($request->filled('nombrecorriente')) {
            // Guardar nuevo estado
            $uco = new   magCorriente();
            // nombre columna-----------creates
            $uco->nombrecorriente = $request->nombrecorriente;
            $uco->abreviacioncorriente = $request->abreviacioncorriente;
            // $uali->abrefuentealimen= $request->abrefuentealimen;

            $uco->save();
            $hdv->mag_corriente_id = $uco->id; // Asignar el ID del nuevo estado al modelo hoja de vida
        } elseif ($request->filled('mag_corriente_id')) {
            // Asignar estado existente
            $hdv->mag_corriente_id = $request->mag_corriente_id;
        }

        if ($request->filled('nombrepeso')) {
            // Guardar nuevo estado
            $upeso = new magPeso();
            // nombre columna-----------creates
            $upeso->nombrepeso = $request->nombrepeso;
            $upeso->abreviacionpeso = $request->abreviacionpeso;
            // $uali->abrefuentealimen= $request->abrefuentealimen;

            $upeso->save();
            $hdv->mag_peso_id = $upeso->id; // Asignar el ID del nuevo estado al modelo hoja de vida

        } elseif ($request->filled('acce')) {
            // Asignar estado existente
            $hdv->mag_peso_id = $request->mag_peso_id;
        }

        //++++++++++++++++++++++++++++++++++++++++++++++
        //
        //                                  guardar accesorios
        //
        //++++++++++++++++++++++++++++++++++++++++++++++
        // Validación de la Hoja de Vida, si la necesitas
        // 7. Guarda la Hoja de Vida en la base de datos
        $hdv->save();

        // 8. Guarda los accesorios asociados
        if ($request->filled('nombreAccesorio')) {
            foreach ($request->nombreAccesorio as $index => $nombre) {
                $datosAccesorio = [
                    'nombreAccesorio' => $nombre,
                    'marcaAccesorio' => $request->marcaAccesorio[$index] ?? null,
                    'modeloAccesorio' => $request->modeloAccesorio[$index] ?? null,
                    'serieAccesorio' => $request->serieAccesorio[$index] ?? null,
                    'costoAccesorio' => $request->costoAccesorio[$index] ?? null,
                ];
                $hdv->accesorios()->create($datosAccesorio);
            }
        } elseif ($request->filled('accesorio_id')) {
            // Asignar estado existente
            $hdv->accesorio_id = $request->accesorio_id;
        }
        //++++++++++++++++++++++++++++++++++++++++++++++
        //
        //                                  guardar fabricante y proveedor
        //
        //++++++++++++++++++++++++++++++++++++++++++++++
        // $nuevoFabricante = fabricante::create([
        //     'nombreFabri' => $request->nombreFabri,
        //     'direccionFabri' => $request->direccionFabri,
        //     // ... otros campos del fabricante
        //     'telefonoFabri' => $request->telefonoFabri,
        //     'ciudadFabri' => $request->ciudadFabri,
        //     'emailWebFabri' => $request->emailWebFabri,
        // ]);

        // $hdv->fabricante_id = $nuevoFabricante->id;

        // $nuevoProveedor = proveedor::create([
        //     'nombreProveedor' => $request->nombreProveedor,
        //     'direccionProvee' => $request->direccionProvee,
        //     // ... otros campos del fabricante
        //     'telefonoProvee' => $request->telefonoProvee,
        //     'ciudadProvee' => $request->ciudadProvee,
        //     'emailWebProve' => $request->emailWebProve,
        // ]);

        // $hdv->proveedor_id = $nuevoProveedor->id;
        // // $hdv->save();






        if ($request->filled('nombreFabri')) {
            // Guardar nuevo estado
            $fab = new fabricante();
            // nombre columna-----------creates
            $fab->nombreFabri = $request->nombreFabri;
            $fab->direccionFabri = $request->direccionFabri;
            $fab->telefonoFabri = $request->telefonoFabri;
            $fab->ciudadFabri = $request->ciudadFabri;
            $fab->emailWebFabri = $request->emailWebFabri;
            // $fab->abrefuentealimen= $request->abrefuentealimen;

            $fab->save();
            $hdv->fabricante_id = $fab->id; // Asignar el ID del nuevo estado al modelo hoja de vida
        } elseif ($request->filled('fabricante_id')) {
            // Asignar estado existente
            $hdv->fabricante_id = $request->fabricante_id;
        }

        if ($request->filled('nombreProveedor')) {
            // Guardar nuevo estado
            $prove = new proveedor();
            // nombre columna-----------creates
            $prove->nombreProveedor = $request->nombreProveedor;
            $prove->direccionProvee = $request->direccionProvee;
            $prove->telefonoProvee = $request->telefonoProvee;
            $prove->ciudadProvee = $request->ciudadProvee;
            $prove->emailWebProve = $request->emailWebProve;
            // $fab->abrefuentealimen= $request->abrefuentealimen;

            $prove->save();
            $hdv->proveedor_id = $prove->id; // Asignar el ID del nuevo estado al modelo hoja de vida
        } elseif ($request->filled('proveedor_id')) {
            // Asignar estado existente
            $hdv->proveedor_id = $request->proveedor_id;
        }

        $hdv->user_id = Auth::user()->id;
        // $hdv->fabricante_id = $request->fabricante_id;
        // $hdv->proveedor_id = $request->proveedor_id;

        $hdv->save();
        // return redirect()->route('hojadevida.listar')->with('success', '¡Registro creado exitosamente!');        // para llevar al la lista o direccionar



        // 3. Redirigir al método show con el ID del nuevo registro
        return redirect()->route('hojadevida.show',  ['hdv' => $hdv->id])
            ->with('success', 'Hoja de vida creada exitosamente.');
    }


    private function traducirMes($mesIngles)
    {
        $traducciones = [
            'january' => 'enero',
            'february' => 'febrero',
            'march' => 'marzo',
            'april' => 'abril',
            'may' => 'mayo',
            'june' => 'junio',
            'july' => 'julio',
            'august' => 'agosto',
            'september' => 'septiembre',
            'october' => 'octubre',
            'november' => 'noviembre',
            'december' => 'diciembre',
        ];

        return $traducciones[$mesIngles] ?? null;
    }
    // public function store(Request $request)
    // {
    //     $hdv = new Hojadevida();

    //     $request->validate([
    //         'perioCali' => 'required|string',
    //         'fechaCali' => 'nullable|date',
    //         'foto' => 'required|max:10000|mimes:jpeg,png,jpg,gif,svg',
    //     ]);

    //     $hdv->equipo_id = $request->equipo_id;
    //     $hdv->modelo_id = $request->modelo_id;
    //     $hdv->marca_id = $request->marca_id;
    //     $hdv->servicio_id = $request->servicio_id;
    //     $hdv->serie = $request->serie;
    //     $hdv->tec_predo_id = $request->tec_predo_id;
    //     // $hdv->perioCali = $request->perioCali;
    //     // $hdv->fechaCali = $request->fechaCali;
    //     // $hdv->cod_ecris = $request->cod_ecris;
    //     $hdv->actFijo = $request->actFijo;
    //     // $hdv->regInvimai = $request->regInvimai;
    //     $hdv->Estado = $request->Estado;
    //     // $hdv->cla_riesgos = $request->cla_riesgos;
    //     // $hdv->cla_biomes = $request->cla_biomes;
    //     // $hdv->foto = $request->foto;
    //     // $hdv->foto = $request->file('foto')->store('public/fotos');
    //     if ($request->hasFile('foto')) {
    //         $hdv->foto = $request->file('foto')->store('public/fotos');
    //         $hdv->foto = str_replace('public/', '', $hdv->foto); // Eliminar 'public/' para la BD
    //     }
    //     // Hojadevida::create([
    //     //     // 'nombre' => $request->nombre,
    //     //     'foto' => $nombreImagen ?? null
    //     // ]);
    //     // $hojadevida = new Hojadevida();
    //     $hdv->perioCali = $request->input('perioCali');

    //     // Solo establecer fechaCali si perioCali es 'anual'
    //     if (strtolower($request->input('perioCali')) === 'Anual') {
    //         $hdv->fechaCali = $request->input('fechaCali');
    //     } else {
    //         $hdv->fechaCali = null;
    //     }
    //     $hdv->save();
    //     // return $curso;
    //     return redirect()->route('hojadevida.listar');        // para llevar al la lista o direccionar
    //     // return view('hojadevida.listar');
    // }



    public function show($hdvs, Request $request)
    {
        $hdvs = Hojadevida::findOrFail($hdvs);



        return view('hojadevida.show', compact('hdvs'));
    }


    //     public function shows($id, Request $request)
    // {
    //     $hdvs = Hojadevida::with('accesorios')->findOrFail($id);
    //     $accesorios = accesorio::with('accesorios')->findOrFail($id);

    //     return view('hojadevida.showpdf', compact('hdvs', 'accesorios'));
    // }


    /**
     * Edición (placeholder si se necesita implementar edición completa).
     */
    public function edit(hojadevida $hdv)
    {
        $nombreservicios = Servicio::all();
        $nombreEquipos = NombreEquipo::all();
        $equipos = Equipo::orderBy('nombre_equipo', 'asc')->get();
        $estadoequipo = estadoequipo::all();
        $marcas = Marca::all();
        $modelos = Modelo::all();

        //   $estadoequipo = estadoequipo::all();
        $ubifisicas = Ubifisica::all();
        $tecPredos = TecPredo::all();
        $clariesgo = Clariesgo::all();
        $clabiomedica = ClaBiome::all();
        $clauso = ClaUso::all();
        $codiecri = codEcri::all();
        $formaadqui = Formaadqui::all();
        $propiedad = Propiedad::all();

        $nombrealimentacion = magFuenAlimen::all();
        $abreviacionvolumen = magVol::all();
        $magFrec = magFre::all();
        $fuentesAli = magFuenAli::all();
        $corrientes = magCorriente::all();
        $pesos = magPeso::all();
        $presiones = magPre::all();
        $potencias = MagPot::all();
        $temperaturas = MagTemp::all();
        $dimensiones  = magDimension::all();
        $velocidad = magVel::all();
        $accesorios = accesorio::all();
        $fabricantes = fabricante::all();
        $proveedores = proveedor::all();
        return view('hojadevida.edit', compact(
            'hdv',
            'marcas',
            'modelos',
            'nombreEquipos',
            'nombreservicios',
            'tecPredos',
            'codiecri',
            'clariesgo',
            'clabiomedica',
            'clauso',
            'formaadqui',
            'equipos',
            'propiedad',
            'nombrealimentacion',
            'abreviacionvolumen',
            'ubifisicas',
            'estadoequipo',
            'magFrec',
            'fuentesAli',
            'corrientes',
            'pesos',
            'presiones',
            'potencias',
            'temperaturas',
            'velocidad',
            'dimensiones',
            'accesorios',
            'fabricantes',
            'proveedores'
        ));
    }



    /**
     * Actualiza datos del usuario (usado para perfil/usuarios; se mantiene la lógica original).
     */
    public function update(Request $request, Hojadevida $hdv)
    {
        // dd($request->all()); // Se pone para ver los datos que llegan del formulario



        $request->validate([
            'perioMto' => 'nullable|string|max:255',
            'perioCali' => 'nullable|in:trimestre,cuatrimestre,anual',
            // Nota: 'required_if:perioCali,ANUAL' se mantiene como estaba en tu código original.
            'fechaCali' => 'required_if:perioCali,ANUAL|date|before_or_equal:today|nullable',
            'foto' => 'nullable|max:10000|mimes:jpeg,png,jpg,gif,svg',
            'soporteFactura' => 'nullable|mimes:pdf|max:10000',
            'soporteRegistroInvima' => 'nullable|mimes:pdf|max:10000',
            'soporteCertificadoCalibracion' => 'nullable|mimes:pdf|max:10000',
            'soporteManual' => 'nullable|mimes:pdf|max:10000',
            'soporteLimpiezaDesinfeccion' => 'nullable|mimes:pdf|max:10000',
            // 'codigo'=>'nullable|string|max:255',

        ]);

        // Cálculo de mes final según periodo de calibración (lógica original)
        if ($request->filled('fechaCali')) {
            $fecha = Carbon::parse($request->fechaCali);
        } else {
            $fecha = Carbon::now();
        }
        $tipoPeriodo = $request->perioCali;
        $mesesASumar = match ($tipoPeriodo) {
            'trimestre' => 3,
            'cuatrimestre' => 4,
            'anual' => 12,
            default => 0,
        };

        $mesFinal = $fecha->copy()->addMonths($mesesASumar)->format('F');
        $mesTraducido = $this->traducirMes(strtolower($mesFinal));

        $hdv->fechaCali = $request->fechaCali;
        $hdv->perioCali = $tipoPeriodo;

        // Si se pudo traducir el mes, marca la columna correspondiente con 'X' (mantener lógica original)
        if ($mesTraducido) {
            $hdv->$mesTraducido = 'X';
        }

        // Asignación de campos básicos/descripciones
        $hdv->equipo_id = $request->equipo_id;
        $hdv->modelo_id = $request->modelo_id;
        $hdv->marca_id = $request->marca_id;
        $hdv->codigo = $request->codigo;
        $hdv->serie = $request->serie;
        $hdv->actFijo = $request->actFijo;
        $hdv->estadoequipo_id = $request->estadoequipo_id;
        $hdv->ubifisica_id = $request->ubifisica_id;
        $hdv->servicio_id = $request->servicio_id;
        $hdv->tec_predo_id = $request->tec_predo_id;
        $hdv->regInvima = $request->regInvima;
        $hdv->cla_riesgo_id = $request->cla_riesgo_id;
        $hdv->cla_biome_id = $request->cla_biome_id;
        $hdv->cla_uso_id = $request->cla_uso_id;
        $hdv->perioMto = $request->perioMto;
        $hdv->cod_ecri_id = $request->cod_ecri_id;

        // Guardar foto (si existe) y normalizar ruta para BD
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/fotos');
            $hdv->foto = str_replace('public/', '', $path);
        }

        // Registro histórico
        $hdv->fechaAdquisicion = $request->fechaAdquisicion;
        $hdv->fechaInstalacion = $request->fechaInstalacion;
        $hdv->garantia = $request->garantia;
        $hdv->factura = $request->factura;
        $hdv->forma_adqui_id = $request->forma_adqui_id;
        $hdv->vidaUtil = $request->vidaUtil;
        $hdv->costo = $request->costo;
        $hdv->propiedad_id = $request->propiedad_id;

        // Registro técnico
        $hdv->mag_fuen_alimen_id = $request->mag_fuen_alimen_id;
        $hdv->frecuencia = $request->frecuencia;
        $hdv->mag_fre_id = $request->mag_fre_id;
        $hdv->volMax = $request->volMax;
        $hdv->volMin = $request->volMin;
        $hdv->mag_fuen_ali_id = $request->mag_fuen_ali_id;
        $hdv->corrienteMax = $request->corrienteMax;
        $hdv->corrienteMin = $request->corrienteMin;
        $hdv->mag_corriente_id = $request->mag_corriente_id;
        $hdv->peso = $request->peso;

        $hdv->mag_peso_id = $request->mag_peso_id;
        $hdv->presion = $request->presion;
        $hdv->mag_pre_id = $request->mag_pre_id;
        $hdv->mag_pot_id = $request->mag_pot_id;
        $hdv->temperatura = $request->temperatura;
        $hdv->mag_temp_id = $request->mag_temp_id;
        $hdv->velocidad = $request->velocidad;
        $hdv->mag_vel_id = $request->mag_vel_id;
        $hdv->humedad = $request->humedad;
        $hdv->dimLargo = $request->dimLargo;
        $hdv->potencia = $request->potencia;
        $hdv->dimAncho = $request->dimAncho;
        $hdv->dimAlto = $request->dimAlto;
        $hdv->mag_dimension_id = $request->mag_dimension_id;

        // $hdv->accesorio = $request->accesorio;
        $hdv->recomendaciones = $request->recomendaciones; // establece un valor por defecto si no se proporciona

        // $hdv->accesorio_id = $request->accesorio_id; // accesorios mostrar
        // $hdv->fabricante_id = $request->fabricante_id; // fabricante mostrar
        // $hdv->proveedor_id = $request->proveedor_id; // proveedor mostrar

        // Guardar PDFs de soporte (si existen) y normalizar rutas para BD
        if ($request->hasFile('soporteFactura')) {
            $p = $request->file('soporteFactura')->store('public/soportes');
            $hdv->soporteFactura = str_replace('public/', '', $p);
        }
        if ($request->hasFile('soporteRegistroInvima')) {
            $p = $request->file('soporteRegistroInvima')->store('public/soportes');
            $hdv->soporteRegistroInvima = str_replace('public/', '', $p);
        }
        if ($request->hasFile('soporteCertificadoCalibracion')) {
            $p = $request->file('soporteCertificadoCalibracion')->store('public/soportes');
            $hdv->soporteCertificadoCalibracion = str_replace('public/', '', $p);
        }
        if ($request->hasFile('soporteManual')) {
            $p = $request->file('soporteManual')->store('public/soportes');
            $hdv->soporteManual = str_replace('public/', '', $p);
        }
        if ($request->hasFile('soporteLimpiezaDesinfeccion')) {
            $p = $request->file('soporteLimpiezaDesinfeccion')->store('public/soportes');
            $hdv->soporteLimpiezaDesinfeccion = str_replace('public/', '', $p);
        }

        // Creación/Asignación de entidades auxiliares si llegan como texto (mantengo la lógica original)
        if ($request->filled('estadoequipo')) {
            $estado = new estadoequipo();
            $estado->estadoequipo = $request->estadoequipo;
            $estado->save();
            $hdv->estadoequipo_id = $estado->id;
        } elseif ($request->filled('estadoequipo_id')) {
            $hdv->estadoequipo_id = $request->estadoequipo_id;
        }

        if ($request->filled('ubifisicas')) {
            $ubi = new ubiFisica();
            $ubi->ubicacionfisica = $request->ubifisicas;
            $ubi->save();
            $hdv->ubifisica_id = $ubi->id;
        } elseif ($request->filled('ubifisica_id')) {
            $hdv->ubifisica_id = $request->ubifisica_id;
        }
        if ($request->filled('nombreservicios')) {
            $serv = new servicio();
            $serv->nombreservicio = $request->nombreservicios;
            $serv->save();
            $hdv->servicio_id = $serv->id;
        } elseif ($request->filled('servicio_id')) {
            $hdv->servicio_id = $request->servicio_id;
        }

        if ($request->filled('tecPredos')) {
            $pre = new tecPredo();
            $pre->tecpredo = $request->tecPredos;
            $pre->save();
            $hdv->tec_predo_id = $pre->id;
        } elseif ($request->filled('tec_predo_id')) {
            $hdv->tec_predo_id = $request->tec_predo_id;
        }

        if ($request->filled('clariesgo')) {
            $rie = new clariesgo();
            $rie->clariesgo = $request->clariesgo;
            $rie->save();
            $hdv->cla_riesgo_id = $rie->id;
        } elseif ($request->filled('cla_riesgo_id')) {
            $hdv->cla_riesgo_id = $request->cla_riesgo_id;
        }

        if ($request->filled('clabiomedica')) {
            $bio = new clabiome();
            $bio->clabiomedica = $request->clabiomedica;
            $bio->save();
            $hdv->cla_biome_id = $bio->id;
        } elseif ($request->filled('cla_biome_id')) {
            $hdv->cla_biome_id = $request->cla_biome_id;
        }

        if ($request->filled('clauso')) {
            $uso = new clauso();
            $uso->clauso = $request->clauso;
            $uso->save();
            $hdv->cla_uso_id = $uso->id;
        } elseif ($request->filled('cla_uso_id')) {
            $hdv->cla_uso_id = $request->cla_uso_id;
        }

        if ($request->filled('propiedad')) {
            $pro = new propiedad();
            $pro->nombreempresa = $request->propiedad;
            $pro->nitempresa = $request->nitempresa;
            $pro->direccionempre = $request->direccionempre;
            $pro->telefonoempre = $request->telefonoempre;
            $pro->ciudadempre = $request->ciudadempre;
            $pro->sedeempresa = $request->sedeempresa;
            $pro->emailWebempre = $request->emailWebempre;
            $pro->representanteempresa = $request->representanteempresa;

            if ($request->hasFile('fotos')) {
                $file = $request->file('fotos');
                $fotoprop = time() . '_' . $file->getClientOriginalName();
                $ruta = $file->storeAs('propiedadfotos', $fotoprop, 'public');
                $pro->foto = $ruta;
            }

            $pro->save();
            $hdv->propiedad_id = $pro->id;
        } elseif ($request->filled('propiedad_id')) {
            $hdv->propiedad_id = $request->propiedad_id;
        }

        if ($request->filled('formaadqui')) {
            $adqui = new formaadqui();
            $adqui->formaadqui = $request->formaadqui;
            $adqui->save();
            $hdv->forma_adqui_id = $adqui->id;
        } elseif ($request->filled('forma_adqui_id')) {
            $hdv->forma_adqui_id = $request->forma_adqui_id;
        }

        if ($request->filled('nombrealimentacion')) {
            $fuentgali = new magFuenAlimen();
            $fuentgali->nombrealimentacion = $request->nombrealimentacion;
            $fuentgali->save();
            $hdv->mag_fuen_alimen_id = $fuentgali->id;
        } elseif ($request->filled('mag_fuen_alimen_id')) {
            $hdv->mag_fuen_alimen_id = $request->mag_fuen_alimen_id;
        }

        if ($request->filled('nombrefrecuencia')) {
            $ufre = new magFre();
            $ufre->nombrefrecuencia = $request->nombrefrecuencia;
            $ufre->abreviacionfrecuencia = $request->abreviacionfrecuencia;
            $ufre->save();
            $hdv->mag_fre_id = $ufre->id;
        } elseif ($request->filled('mag_fre_id')) {
            $hdv->mag_fre_id = $request->mag_fre_id;
        }

        if ($request->filled('nombrecorriente')) {
            // Guardar nuevo estado
            $uco = new   magCorriente();
            // nombre columna-----------creates
            $uco->nombrecorriente = $request->nombrecorriente;
            $uco->abreviacioncorriente = $request->abreviacioncorriente;
            // $uali->abrefuentealimen= $request->abrefuentealimen;

            $uco->save();
            $hdv->mag_corriente_id = $uco->id; // Asignar el ID del nuevo estado al modelo hoja de vida
        } elseif ($request->filled('mag_corriente_id')) {
            // Asignar estado existente
            $hdv->mag_corriente_id = $request->mag_corriente_id;
        }

        if ($request->filled('nombrepeso')) {
            // Guardar nuevo estado
            $upeso = new magPeso();
            // nombre columna-----------creates
            $upeso->nombrepeso = $request->nombrepeso;
            $upeso->abreviacionpeso = $request->abreviacionpeso;
            // $uali->abrefuentealimen= $request->abrefuentealimen;

            $upeso->save();
            $hdv->mag_peso_id = $upeso->id; // Asignar el ID del nuevo estado al modelo hoja de vida

        } elseif ($request->filled('acce')) {
            // Asignar estado existente
            $hdv->mag_peso_id = $request->mag_peso_id;
        }

        //++++++++++++++++++++++++++++++++++++++++++++++
        //
        //                                  guardar accesorios
        //
        //++++++++++++++++++++++++++++++++++++++++++++++
        // Validación de la Hoja de Vida, si la necesitas
        // 7. Guarda la Hoja de Vida en la base de datos
        $hdv->save();

        // 8. Guarda los accesorios asociados
        // Actualiza datos generales del equipo
        $hdv->update($request->all());
        $idsEnviados = array_filter($request->accesorio_id ?? []);

        // 1. Eliminar accesorios que ya no están en el formulario
        $hdv->accesorios()
            ->whereNotIn('id', $idsEnviados)
            ->delete();


        // Manejo de accesorios
        foreach ($request->nombreAccesorio as $index => $nombre) {
            $accesorioId = $request->accesorio_id[$index] ?? null;

            if ($accesorioId) {
                // Actualizar accesorio existente
                $accesorio = Accesorio::find($accesorioId);
                if ($accesorio) {
                    $accesorio->update([
                        'nombreAccesorio' => $nombre,
                        'marcaAccesorio'  => $request->marcaAccesorio[$index],
                        'modeloAccesorio' => $request->modeloAccesorio[$index],
                        'serieAccesorio'  => $request->serieAccesorio[$index],
                        'costoAccesorio'  => $request->costoAccesorio[$index],
                    ]);
                }
            } else {
                // Crear nuevo accesorio
                $hdv->accesorios()->create([
                    'nombreAccesorio' => $nombre,
                    'marcaAccesorio'  => $request->marcaAccesorio[$index],
                    'modeloAccesorio' => $request->modeloAccesorio[$index],
                    'serieAccesorio'  => $request->serieAccesorio[$index],
                    'costoAccesorio'  => $request->costoAccesorio[$index],
                ]);
            }
        }




        if ($request->filled('nombreFabri')) {
            // Guardar nuevo estado
            $fab = new fabricante();
            // nombre columna-----------creates
            $fab->nombreFabri = $request->nombreFabri;
            $fab->direccionFabri = $request->direccionFabri;
            $fab->telefonoFabri = $request->telefonoFabri;
            $fab->ciudadFabri = $request->ciudadFabri;
            $fab->emailWebFabri = $request->emailWebFabri;
            // $fab->abrefuentealimen= $request->abrefuentealimen;

            $fab->save();
            $hdv->fabricante_id = $fab->id; // Asignar el ID del nuevo estado al modelo hoja de vida
        } elseif ($request->filled('fabricante_id')) {
            // Asignar estado existente
            $hdv->fabricante_id = $request->fabricante_id;
        }
        if ($request->filled('nombreProveedor')) {
            // Guardar nuevo estado
            $prove = new proveedor();
            // nombre columna-----------creates
            $prove->nombreProveedor = $request->nombreProveedor;
            $prove->direccionProvee = $request->direccionProvee;
            $prove->telefonoProvee = $request->telefonoProvee;
            $prove->ciudadProvee = $request->ciudadProvee;
            $prove->emailWebProve = $request->emailWebProve;
            // $fab->abrefuentealimen= $request->abrefuentealimen;

            $prove->save();
            $hdv->proveedor_id = $prove->id; // Asignar el ID del nuevo estado al modelo hoja de vida
        } elseif ($request->filled('proveedor_id')) {
            // Asignar estado existente
            $hdv->proveedor_id = $request->proveedor_id;
        }

        $hdv->user_id = Auth::user()->id;
        // $hdv->fabricante_id = $request->fabricante_id;
        // $hdv->proveedor_id = $request->proveedor_id;

        $hdv->save();
        // return redirect()->route('hojadevida.listar')->with('success', '¡Registro creado exitosamente!');        // para llevar al la lista o direccionar



        // 3. Redirigir al método show con el ID del nuevo registro
        return redirect()->route('hojadevida.show',  ['hdv' => $hdv->id])
            ->with('success', 'Hoja de vida creada exitosamente.');
    }


    public function updateuser(Request $request, User $user, Hojadevida $hojadevida)
    {
        $user->role = $request->role;
        $user->name = $request->name;
        $user->identity = $request->identity;

        if ($request->hasFile('foto')) {
            $user->foto = $request->file('foto')->store('public/fotos');
            $user->foto = str_replace('public/', '', $user->foto);
        }

        $user->contact = $request->contact;
        $user->adress = $request->adress;
        $user->profession = $request->profession;
        $user->post = $request->post;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile.edit')->with('success', '¡Registro actualizado exitosamente!');
    }

    /**
     * Eliminar (placeholder).
     */
    // public function destroy(hojadevida $hojadevida)
    // {
    //     // Si necesitas soportar eliminación, implementar aquí.
    // }
    public function destroy(hojadevida $hdvs)
    {
        $hdvs->delete();
        return redirect()->route('hojadevida.listar');
    }
}
