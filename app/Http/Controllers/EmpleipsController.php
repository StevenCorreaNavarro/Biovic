<?php

namespace App\Http\Controllers;

use App\Models\empleips;
use Illuminate\Http\Request;

class EmpleipsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datosempleips['empleips']=empleips::paginate(5);// se crea la variable $datos
        return view('empleips.index',$datosempleips);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $empleips = new Empleips();
        return view('empleips.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosEmpleips = request()->except('_token'); // guardo los datos que me envie el formulario create, menos el token, en datosEmpleips

        if($request->hasFile('fotoempleips')){ // si existe fotoempleips,  se guardara en public/uploads
            $datosEmpleips['fotoempleips']=$request->file('fotoempleips')->store('uploads','public');
        }

        Empleips::insert($datosEmpleips); // agarra el modelo e inserta en la base de datos
        return response()->json($datosEmpleips); // retornar los datos que me enviaron en formato Json
    }

    /**
     * Display the specified resource.
     */
    public function show(empleips $empleips)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleips=empleips::findOrFail($id);// buscamos la informacion del empleado con el id que recibimos, la almacenamos en $empleips2 y la enviamos al formulario
        return view('empleips.edit', compact('empleips'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datosEmpleips = request()->except(['_token','_method']); // guardo los datos que me envie el formulario create, menos el token y el metodo, en datosEmpleips
        empleips::where('id', '=',$id)->update($datosEmpleips);

        $empleips=empleips::findOrFail($id);// buscamos la informacion del empleado con el id que recibimos, la almacenamos en $empleips2 y la enviamos al formulario
        return view('empleips.edit', compact('empleips'));
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) // recibe el parametro para eliminar action="{{url('/empleips/'.$empleado->id.'/edit')}}
    {
        Empleips::destroy($id);
        return redirect('empleips'); // redirecciona a la vista index de empleados
        
    }
}
