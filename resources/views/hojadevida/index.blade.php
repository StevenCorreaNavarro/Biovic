{{-- 10-   VISTA hojadevida/INDEX --}}

<a href="{{url('hojadevida/create')}}" class="btn btn-primary"> <h3> Registrar Nueva hoja de vida  </h3> </a>
<br>
<br>

<h1>   LISTADO DE HOJA DE VIDAS </h1>

<table class="table table-light">
    <thead class="thead-light">{{-- Cabezera de la consulta --}}
        <tr>
            <th>ID</th>
            <th>FOTO</th>
            <th>NOMBRE EQUIPO</th>
            <th>MARCA</th>
            <th>MODELO</th>
            <th>SERIE</th>
            <th>ACTIVO FIJO</th>
            <th>SERVICIO</th>
            <th>UBICACION FISICA</th>

        </tr>
    </thead>


    <tbody>
        @foreach ($hojadevida as $hojadevida)
            
        <tr>
            <td>{{$hojadevida-> id }}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$equipo->foto}}" width="100" alt=""> 
            </td>
            <td>{{$hojadevida-> nombreequipo}}</td> {{--  ? $hojadevida->nombreequipo->nombreequipo : 'Sin Nombre' }}</td>  --}}
            <td>{{$hojadevida-> marca }}</td>
            <td>{{$hojadevida-> modelo}}</td>
            <td>{{$hojadevida-> serie}}</td>
            <td>{{$hojadevida-> actFijo}}</td>
            <td>{{$hojadevida-> servicio}}</td>
            <td>{{$hojadevida-> nombreubicacio}}</td>


            {{-- // acciones  --}}
            <td>
                {{-- 22- Crear boton Editar: <hojadevida/id/edit</edit> --}}
                <a href="{{url('/hojadevida/'.$hojadevida->id.'/edit')}}">
                Editar 
                </a>

                {{-- 19- ACCION ELIMINAR --}}
                <form action="{{url('/hojadevida/'.$hojadevida->id)}}"  method="post" >  {{-- Envio los datos para ser borrados  --}}
                    @csrf
                    {{method_field('DELETE')}} 
                    <input type="submit" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">
                </form>

                {{-- Mostrar hojadevida --}}
                <a href="{{url('/hojadevida/'.$hojadevida->id.'/show')}}">
                Mostrar 
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table> 

