<form action="{{url('/empleips')}}" method="post" enctype="multipart/form-data">
    @csrf
    {{-- Forma de incluir el formulario --}}
    @include('empleips.form')

</form>