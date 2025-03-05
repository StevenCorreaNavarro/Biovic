<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>FOTO</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>IDENTIFICACION</th>
            <th>NUMERO</th>
            <th>EMAIL</th>
            <th>DIRECCION</th>
            <th>PROFESION</th>
            <th>CARGO</th>
        </tr>
    </thead>
    <tbody>
        {{-- empleips es la variable del controlador, se guarda como empleado y es la que se muestra en index --}}
        @foreach ($empleips as $empleado) 
            
        <tr>
            <td>{{$empleado-> id }}</td>
            <td>
                <img src="{{ asset('storage').'/'.$empleado->fotoempleips}}" alt="Foto empleado" width="100" height="100">
            </td> 
            <td>{{$empleado-> nombreempleips }}</td>
            <td>{{$empleado-> apellioempleips }}</td>
            <td>{{$empleado-> identificacionempleips }}</td>
            <td>{{$empleado-> numerocelempleips }}</td>
            <td>{{$empleado-> emailempleips }}</td>
            <td>{{$empleado-> direccionempleips }}</td>
            <td>{{$empleado-> profesionempleips }}</td>
            <td>{{$empleado-> cargoempleips }}</td>
            <td> 
                <a href="{{ url('/empleips/'.$empleado->id.'/edit')}}"> Editar</a>


                {{-- envia el empleips junto con el id para que se pueda borrar, al presionar boton se confirma --}}
                <form action="{{url('/empleips/'.$empleado->id)}}" method="post">
                    @csrf
                    {{-- Se utiliza para cambiar al metodo valido para borrado, de post a delete --}}
                    {{method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('Quieres borrar empleado ips?')" value="Borrar">
                </form>
            </td>
        
        </tr>
        @endforeach
    </tbody>
</table>