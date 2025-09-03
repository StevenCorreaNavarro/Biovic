<?php

namespace App\Http\Controllers;

use App\Models\estadoequipo; // 1. agregar aqui para mostrar valores
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
use App\Models\magFuenAlimen; // para la alimentacion de los equipos con que trabajan 
use App\Models\magVol;
use App\Models\equipo;
use App\Models\magFre;
use App\Models\magFuenAli; // para la alimentacion de los voltages 
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
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use Carbon\Carbon; // para calcular fecha futura 


class HojadevidaController extends Controller
{
    public function downloadPDF($id)
    {
        // Buscar los datos de la tabla Hdvs usando el ID
        $hdvs = Hojadevida::findOrFail($id);
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true); // Habilita imágenes remotas
        $pdf = new Dompdf($options);
        $pdf->loadHtml(view('hojadevida.showpdf', compact('hdvs'))->render());
        $pdf->setPaper('A4', 'portrait'); // Tamaño A4 vertical
        $pdf->render();
        return $pdf->stream('documento.pdf');
    }


    public function listar(Request $request)
    {
        $hdvs = hojadevida::orderBy('id', 'Asc')->get();
        // $hdvs = hojadevida::with('equipo')->get();
        $query = Hojadevida::with('equipo', 'servicio', 'propiedad');

        if ($request->has('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                // Búsqueda por equipo relacionado
                $q->whereHas('equipo', function ($eq) use ($search) {
                    $eq->where('nombre_equipo', 'LIKE', "%$search%")
                        ->orWhere('serie', 'LIKE', "%$search%")
                        ->orWhere('actFijo', 'LIKE', "%$search%");
                })
                    // Búsqueda por nombre de propiedad (desde la relación en hojadevida)
                    ->orWhereHas('propiedad', function ($p) use ($search) {
                        $p->where('nombreempresa', 'LIKE', "%$search%");
                    });
            });
        }

        $hdvs = $query->orderBy('id', 'desc')->get();
        return view('hojadevida.listar', compact('hdvs'));


        // $hdvs = Hojadevida::orderBy('id', 'desc')->get();
        // return view('hojadevida.listar', compact('hdvs'));
    }

    public function index()
    {
        $datos['hojadevida'] = Hojadevida::paginate(10); //
        return view('hojadevida.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function creates() // por que hay dos create ?
    {
        return view('hojadevida.create');
    }

    public function create()
    { // 2. Agregar el modelo aqui para mostrar valores
        $nombreservicios = Servicio::all();
        $nombreEquipos = NombreEquipo::all();
        $equipos = Equipo::orderBy('nombre_equipo', 'asc')->get();

        $estadoequipo = estadoequipo::all(); // usar el modelo estadoequipo Obtiene todos los estados de equipo. $estadoequipo, copiar en compact
        $ubifisicas = Ubifisica::all(); // Obtiene todas las ubicaciones físicas
        $nombreservicios = Servicio::all();

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


        // 3. enviar los datos a la vista
        return view('hojadevida.create', compact('nombreEquipos', 'nombreservicios', 'tecPredos', 'codiecri', 'clariesgo', 'clabiomedica', 'clauso', 'formaadqui', 'equipos', 'propiedad', 'nombrealimentacion', 'abreviacionvolumen', 'ubifisicas', 'estadoequipo', 'magFrec', 'fuentesAli', 'corrientes', 'pesos', 'presiones', 'potencias', 'temperaturas', 'velocidad', 'dimensiones', 'accesorios', 'fabricantes', 'proveedores')); // pasar las variables  a la vista
    }
    public function edituser(User $user)
    {

        return view('users.useredit', compact('user'));
    }
    // public function create()
    // {

    //     $estadoequipo = estadoequipo::all(); // usar el modelo estadoequipo Obtiene todos los estados de equipo. $estadoequipo, copiar en compact
    //     $ubifisicas = Ubifisica::all(); // Obtiene todas las ubicaciones físicas


    //     $nombreservicios = Servicio::all();
    //     $nombreEquipos = NombreEquipo::all();
    //     $equipos = Equipo::all();
    //     $tecPredos = TecPredo::all();
    //     $codiecri = codEcri::all();
    //     $clariesgo = Clariesgo::all();
    //     $clabiomedica = ClaBiome::all();
    //     $clauso = ClaUso::all();
    //     $formaadqui = Formaadqui::all();
    //     $nombreempresa = Propiedad::all();
    //     $nombrealimentacion = magFuenAlimen::all(); //
    //     $abreviacionvolumen = magVol::all(); //
    //     return view('hojadevida.create', compact('nombreEquipos', 'nombreservicios', 'tecPredos', 'codiecri', 'clariesgo', 'clabiomedica', 'clauso', 'formaadqui', 'equipos', 'nombreempresa', 'nombrealimentacion', 'abreviacionvolumen','ubifisicas', 'estadoequipo'));
    // }


    /**
     * Store a newly created resource in storage.
     */
    public function stores()
    {
        // Obtener todos los equipos con sus modelos
        $equipos = Equipo::with('modelos')->get();
        // $modelos = Modelo::with('equipo')->get();
        // $equipos = Equipo::all();

        return view('hojadevida.create', compact('equipos'));
    }

    //+++++++++++++++++++++++++++++++++++++++++++aqui se guarda todos los datos delformulario hoja de vida
    public function store(Request $request)
    {
        // dd($request->all()); // Se pone para ver los datos que llegan del formulario
        $hdv = new Hojadevida();
        $request->validate([
            'perioMto' => 'nullable|string|max:255', // agregado para periodo de mantenimiento
            'perioCali' => 'nullable|in:trimestre,cuatrimestre,anual',
            'fechaCali' => 'required_if:perioCali,ANUAL|date|before_or_equal:today|nullable', // validacion y fecha no  posterior a la actual 
            'foto' => 'nullable|max:10000|mimes:jpeg,png,jpg,gif,svg',
            // Nueva funcionalidad para validar  pdf 
            'soporteFactura' => 'nullable|mimes:pdf|max:10000',
            'soporteRegistroInvima' => 'nullable|mimes:pdf|max:10000',
            'soporteCertificadoCalibracion' => 'nullable|mimes:pdf|max:10000',
            'soporteManual' => 'nullable|mimes:pdf|max:10000',
            'soporteLimpiezaDesinfeccion' => 'nullable|mimes:pdf|max:10000',
        ]);

        $fecha = Carbon::parse($request->fechaCali);
        $tipoPeriodo = $request->perioCali;
        $mesesASumar = match ($tipoPeriodo) {
            'trimestre' => 3,    // 6to mes (inicio + 5), agregada ahora
            'cuatrimestre' => 4,   // 3er mes (inicio + 2)
            'anual' => 12,       // 12avo mes (inicio + 11)
            default => 0, // Si no es ninguno de los anteriores, no sumar meses
        };

        // Calcular el mes final
        $mesFinal = $fecha->copy()->addMonths($mesesASumar)->format('F');
        $mesTraducido = $this->traducirMes(strtolower($mesFinal));

        $hdv->fechaCali = $request->fechaCali;
        $hdv->perioCali = $tipoPeriodo;
        // Solo marcar una X en el mes correspondiente
        $hdv->$mesTraducido = 'X';


        // DESCRIPCION DE EQUIPO
        // 4. se hace uno por uno de los datos para que sean guardados
        $hdv->equipo_id = $request->equipo_id;
        $hdv->modelo_id = $request->modelo_id;
        $hdv->marca_id = $request->marca_id;
        $hdv->serie = $request->serie;
        $hdv->actFijo = $request->actFijo;
        $hdv->estadoequipo_id = $request->estadoequipo_id; // para estado poder guardar  original $hdv->estadoequipo = $request->estadoequipo; 
        $hdv->ubifisica_id = $request->ubifisica_id;
        $hdv->servicio_id = $request->servicio_id;
        $hdv->tec_predo_id = $request->tec_predo_id;
        $hdv->regInvima = $request->regInvima;
        $hdv->cla_riesgo_id = $request->cla_riesgo_id;
        $hdv->cla_biome_id = $request->cla_biome_id;
        $hdv->cla_uso_id = $request->cla_uso_id;
        $hdv->perioMto = $request->perioMto; // agregado para periodo de mantenimiento
        $hdv->cod_ecri_id = $request->cod_ecri_id;

        if ($request->hasFile('foto')) {
            $hdv->foto = $request->file('foto')->store('public/fotos');
            $hdv->foto = str_replace('public/', '', $hdv->foto); // Eliminar 'public/' para la BD
        }

        $hdv->perioCali = $request->input('perioCali');

        // REGISTRO HISTORICO
        $hdv->fechaAdquisicion = $request->fechaAdquisicion;
        $hdv->fechaInstalacion = $request->fechaInstalacion;
        $hdv->garantia = $request->garantia;

        $hdv->factura = $request->factura;
        $hdv->forma_adqui_id = $request->forma_adqui_id;
        $hdv->vidaUtil = $request->vidaUtil;

        $hdv->costo = $request->costo;
        $hdv->propiedad_id = $request->propiedad_id;

        // REGISTRO TECNICO
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
        $hdv->peso = $request->peso; // Asignamos el valor de 'peso'
        $hdv->mag_peso_id = $request->mag_peso_id; // Asignamos el ID del peso
        $hdv->temperatura = $request->temperatura;
        $hdv->mag_temp_id = $request->mag_temp_id; // ID de la temperatura seleccionada
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

        // Cargar y guardar los archivos PDF
        if ($request->hasFile('soporteFactura')) {
            $hdv->soporteFactura = $request->file('soporteFactura')->store('public/soportes');
            $hdv->soporteFactura = str_replace('public/', '', $hdv->soporteFactura); // Eliminar 'public/' para la base de datos
        }

        if ($request->hasFile('soporteRegistroInvima')) {
            $hdv->soporteRegistroInvima = $request->file('soporteRegistroInvima')->store('public/soportes');
            $hdv->soporteRegistroInvima = str_replace('public/', '', $hdv->soporteRegistroInvima);
        }

        if ($request->hasFile('soporteCertificadoCalibracion')) {
            $hdv->soporteCertificadoCalibracion = $request->file('soporteCertificadoCalibracion')->store('public/soportes');
            $hdv->soporteCertificadoCalibracion = str_replace('public/', '', $hdv->soporteCertificadoCalibracion);
        }

        if ($request->hasFile('soporteManual')) {
            $hdv->soporteManual = $request->file('soporteManual')->store('public/soportes');
            $hdv->soporteManual = str_replace('public/', '', $hdv->soporteManual);
        }

        if ($request->hasFile('soporteLimpiezaDesinfeccion')) {
            $hdv->soporteLimpiezaDesinfeccion = $request->file('soporteLimpiezaDesinfeccion')->store('public/soportes');
            $hdv->soporteLimpiezaDesinfeccion = str_replace('public/', '', $hdv->soporteLimpiezaDesinfeccion);
        }


        if ($request->filled('estadoequipo')) {
            // Guardar nuevo estado
            $estado = new estadoequipo();
            $estado->estadoequipo = $request->estadoequipo;
            $estado->save();
            $hdv->estadoequipo_id = $estado->id; // Asignar el ID del nuevo estado al modelo hoja de vida
        } elseif ($request->filled('estadoequipo_id')) {
            // Asignar estado existente
            $hdv->estadoequipo_id = $request->estadoequipo_id;
        }

        if ($request->filled('ubifisicas')) {
            // Guardar nuevo estado
            $ubi = new ubiFisica();
            $ubi->ubicacionfisica = $request->ubifisicas;
            $ubi->save();
            $hdv->ubifisica_id = $ubi->id; // Asignar el ID del nuevo estado al modelo hoja de vida
        } elseif ($request->filled('ubifisica_id')) {
            // Asignar estado existente
            $hdv->ubifisica_id = $request->ubifisica_id;
        }
        if ($request->filled('nombreservicios')) {
            // Guardar nuevo estado
            $serv = new servicio();
            // nombre columna-----------creates
            $serv->nombreservicio = $request->nombreservicios;
            $serv->save();
            $hdv->servicio_id = $serv->id; // Asignar el ID del nuevo estado al modelo hoja de vida
        } elseif ($request->filled('servicio_id')) {
            // Asignar estado existente
            $hdv->servicio_id = $request->servicio_id;
        }
        if ($request->filled('tecPredos')) {
            // Guardar nuevo estado
            $pre = new tecPredo();
            // nombre columna-----------creates
            $pre->tecpredo = $request->tecPredos;
            $pre->save();
            $hdv->tec_predo_id = $pre->id; // Asignar el ID del nuevo estado al modelo hoja de vida
        } elseif ($request->filled('tec_predo_id')) {
            // Asignar estado existente
            $hdv->servicio_id = $request->tec_predo_id;
        }
        if ($request->filled('clariesgo')) {
            // Guardar nuevo estado
            $rie = new clariesgo();
            // nombre columna-----------creates
            $rie->clariesgo = $request->clariesgo;
            $rie->save();
            $hdv->cla_riesgo_id = $rie->id; // Asignar el ID del nuevo estado al modelo hoja de vida
        } elseif ($request->filled('cla_riesgo_id')) {
            // Asignar estado existente
            $hdv->cla_riesgo_id = $request->cla_riesgo_id;
        }
        if ($request->filled('clabiomedica')) {
            // Guardar nuevo estado
            $bio = new clabiome();
            // nombre columna-----------creates
            $bio->clabiomedica = $request->clabiomedica;
            $bio->save();
            $hdv->cla_biome_id = $bio->id; // Asignar el ID del nuevo estado al modelo hoja de vida
        } elseif ($request->filled('cla_biome_id')) {
            // Asignar estado existente
            $hdv->cla_biome_id = $request->cla_biome_id;
        }
        if ($request->filled('clauso')) {
            // Guardar nuevo estado
            $uso = new clauso();
            // nombre columna-----------creates
            $uso->clauso = $request->clauso;
            $uso->save();
            $hdv->cla_uso_id = $uso->id; // Asignar el ID del nuevo estado al modelo hoja de vida
        } elseif ($request->filled('cla_uso_id')) {
            // Asignar estado existente
            $hdv->cla_uso_id = $request->cla_uso_id;
        }
        // if ($request->filled('propiedad')) {
        //     // Guardar nuevo estado
        //     $pro = new propiedad ();
        //     // nombre columna-----------creates
        //     $pro->nombreempresa  = $request->propiedad ;
        //     $pro->save();
        //     $hdv->propiedad_id = $pro->id; // Asignar el ID del nuevo estado al modelo hoja de vida
        // } elseif ($request->filled('propiedad_id')) {
        //     // Asignar estado existente
        //     $hdv->propiedad_id = $request->propiedad_id;
        // }
        if ($request->filled('propiedad')) {
            // Guardar nuevo estado
            $pro = new propiedad();
            $pro->nombreempresa = $request->propiedad;
            $pro->nitempresa = $request->nitempresa;
            $pro->direccionempre = $request->direccionempre;
            $pro->telefonoempre = $request->telefonoempre;
            $pro->ciudadempre = $request->ciudadempre;
            $pro->sedeempresa = $request->sedeempresa;

            $pro->emailWebempre = $request->emailWebempre;
            $pro->representanteempresa = $request->representanteempresa;

            // Verifica si se ha subido una imagen
            if ($request->hasFile('fotos')) {
                $file = $request->file('fotos');
                $fotoprop = time() . '_' . $file->getClientOriginalName();
                $ruta = $file->storeAs('propiedadfotos', $fotoprop, 'public'); // se guarda en storage/app/public/estadofotos
                $pro->foto = $ruta;
            }

            $pro->save();
            $hdv->propiedad_id = $pro->id;
        } elseif ($request->filled('propiedad_id')) {
            $hdv->propiedad_id = $request->propiedad_id;
        }

        if ($request->filled('formaadqui')) {
            // Guardar nuevo estado
            $adqui = new formaadqui();
            // nombre columna-----------creates
            $adqui->formaadqui = $request->formaadqui;
            $adqui->save();
            $hdv->forma_adqui_id = $adqui->id; // Asignar el ID del nuevo estado al modelo hoja de vida
        } elseif ($request->filled('forma_adqui_id')) {
            // Asignar estado existente
            $hdv->forma_adqui_id = $request->forma_adqui_id;
        }

        if ($request->filled('nombrealimentacion')) {
            // Guardar nuevo estado
            $fuentgali = new magFuenAlimen();
            // nombre columna-----------creates
            $fuentgali->nombrealimentacion = $request->nombrealimentacion;
            $fuentgali->save();
            $hdv->mag_fuen_alimen_id = $fuentgali->id; // Asignar el ID del nuevo estado al modelo hoja de vida
        } elseif ($request->filled('mag_fuen_alimen_id')) {
            // Asignar estado existente
            $hdv->mag_fuen_alimen_id = $request->mag_fuen_alimen_id;
        }

        if ($request->filled('nombrefrecuencia')) {
            // Guardar nuevo estado
            $ufre = new magFre();
            // nombre columna-----------creates
            $ufre->nombrefrecuencia = $request->nombrefrecuencia;
            $ufre->abreviacionfrecuencia = $request->abreviacionfrecuencia;
            $ufre->save();
            $hdv->mag_fre_id = $ufre->id; // Asignar el ID del nuevo estado al modelo hoja de vida
        } elseif ($request->filled('mag_fre_id')) {
            // Asignar estado existente
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

        } elseif ($request->filled('mag_peso_id')) {
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
        }
        //++++++++++++++++++++++++++++++++++++++++++++++
        //
        //                                  guardar fabricante y proveedor
        //
        //++++++++++++++++++++++++++++++++++++++++++++++
        $nuevoFabricante = fabricante::create([
            'nombreFabri' => $request->nombreFabri,
            'direccionFabri' => $request->direccionFabri,
            // ... otros campos del fabricante
            'telefonoFabri' => $request->telefonoFabri,
            'ciudadFabri' => $request->ciudadFabri,
            'emailWebFabri' => $request->emailWebFabri,
        ]);

        $hdv->fabricante_id = $nuevoFabricante->id;

        $nuevoProveedor = proveedor::create([
            'nombreProveedor' => $request->nombreProveedor,
            'direccionProvee' => $request->direccionProvee,
            // ... otros campos del fabricante
            'telefonoProvee' => $request->telefonoProvee,
            'ciudadProvee' => $request->ciudadProvee,
            'emailWebProve' => $request->emailWebProve,
        ]);

        $hdv->proveedor_id = $nuevoProveedor->id;

        // if ($request->filled('nombreFabri')) {
        //     // Guardar nuevo estado
        //     $fab = new fabricante();
        //     // nombre columna-----------creates
        //     $fab->nombreFabri = $request->nombreFabri;
        //     // $fab->direccionFabri = $request->direccionFabri;
        //     // $fab->telefonoFabri = $request->telefonoFabri;
        //     // $fab->ciudadFabri = $request->ciudadFabri;
        //     // $fab->emailWebFabri = $request->emailWebFabri;
        //     // $uali->abrefuentealimen= $request->abrefuentealimen;

        //     $fab->save();
        //     $hdv->fabricante_id = $fab->id; // Asignar el ID del nuevo estado al modelo hoja de vida
        // } elseif ($request->filled('fabricante_id')) {
        //     // Asignar estado existente
        //     $hdv->fabricante_id = $request->fabricante_id;
        // }
        // $hdv->fabricante_id = $request->fabricante_id_seleccionado;

        $hdv->save();
        return redirect()->route('hojadevida.listar')->with('success', '¡Registro creado exitosamente!');        // para llevar al la lista o direccionar

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



    public function showS($hdvs, Request $request)
    {
        // $query = Hojadevida::with('equipo','servicio');
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
     * Show the form for editing the specified resource.
     */
    public function edit(hojadevida $hojadevida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->role = $request->role;
        $user->name = $request->name;
        $user->identity = $request->identity;
        // $user->foto = $request->foto;
        if ($request->hasFile('foto')) {
            $user->foto = $request->file('foto')->store('public/fotos');
            $user->foto = str_replace('public/', '', $user->foto); // Eliminar 'public/' para la BD
        }
        $user->contact = $request->contact;
        $user->adress = $request->adress;
        $user->profession = $request->profession;
        $user->post = $request->post;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile.edit')->with('success', '¡Registro creado exitosamente!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hojadevida $hojadevida)
    {
        //
    }
}
