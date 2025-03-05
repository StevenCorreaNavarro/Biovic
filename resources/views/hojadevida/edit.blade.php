{{-- 21- FORMULARIO EDITAR --}}
<h1> EDITAR DATOS</h1>
<form action="{{url('/presidente/'.$presidente->id)}}" method="post">
    @csrf
    
    {{ method_field ('PATCH')}} {{-- Envia a Update  todos los datos --}}
    @include('presidente.form');

</form>