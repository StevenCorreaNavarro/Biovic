<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Title</title>
</head>
<body>




    hola desde equipos
    @foreach ($equipos as $equipo)
    <h2>{{ $equipo->nombre_equipo }}</h2>
    <ul>
        @foreach ($equipo->modelos as $modelo)
            <li>{{ $modelo->nombre_modelo }}</li>
        @endforeach
    </ul>
@endforeach

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html> -->




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <label for="equipo">Selecciona un equipo:</label>
        <select id="equipo" name="equipo">
            <option value="">Selecciona un equipo</option>
            @foreach ($equipos as $equipo)
                <option value="{{ $equipo->id }}">{{ $equipo->nombre_equipo }}</option>
            @endforeach
        </select>

        <label for="modelo">Selecciona un modelo:</label>
        <select id="modelo" name="modelo" disabled>
            <option value="">Selecciona un modelo</option>
        </select>
    </div>
    <div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#equipo').change(function() {
                var equipoId = $(this).val(); // Obtener el ID del equipo seleccionado

                if (equipoId) {
                    $.ajax({
                        url: '/get-modelos/' + equipoId, // Ruta en Laravel para obtener los modelos
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#modelo').empty().append(
                                '<option value="">Selecciona un modelo</option>');

                            $.each(data, function(index, modelo) {
                                $('#modelo').append('<option value="' + modelo.id +
                                    '">' + modelo.nombre_modelo + '</option>');
                            });

                            $('#modelo').prop('disabled', false);
                        },
                        error: function() {
                            alert('Error al obtener modelos.');
                        }
                    });
                } else {
                    $('#modelo').empty().append('<option value="">Selecciona un modelo</option>').prop(
                        'disabled', true);
                }
            });
        });
    </script>



</body>

</html>




{{-- <select id="equipo" name="equipo">
    <option value="">Selecciona un equipo</option>
    @foreach ($equipos as $equipo)
        <option value="{{ $equipo->id }}">{{ $equipo->nombre_equipo }}</option>
    @endforeach
</select>

<select id="modelo" name="modelo" disabled>
    <option value="">Selecciona un modelo</option>
</select>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#equipo').change(function() {
            var equipoId = $(this).val();

            if (equipoId) {
                $.get('/get-modelos/' + equipoId, function(data) {
                    $('#modelo').empty().append('<option value="">Selecciona un modelo</option>');
                    
                    $.each(data, function(index, modelo) {
                        $('#modelo').append('<option value="' + modelo.id + '">' + modelo.nombre_modelo + '</option>');
                    });

                    $('#modelo').prop('disabled', false);
                });
            } else {
                $('#modelo').empty().append('<option value="">Selecciona un modelo</option>').prop('disabled', true);
            }
        });
    });
</script> --}}
