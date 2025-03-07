<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seleccionar Equipo, Modelo y Marca</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        <label for="marca">Selecciona una marca:</label>
        <select id="marca" name="marca" disabled>
            <option value="">Selecciona una marca</option>
        </select>
    </div>

    <script>
        $(document).ready(function() {
            // Evento cuando cambia el select de equipo
            $('#equipo').change(function() {
                var equipoId = $(this).val(); // Obtener el ID del equipo seleccionado

                if (equipoId) {
                    $.ajax({
                        url: '/get-modelos/' + equipoId, // Ruta en Laravel para obtener los modelos
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#modelo').empty().append('<option value="">Selecciona un modelo</option>');

                            $.each(data, function(index, modelo) {
                                $('#modelo').append('<option value="' + modelo.id + '">' + modelo.nombre_modelo + '</option>');
                            });

                            $('#modelo').prop('disabled', false);
                            $('#marca').empty().append('<option value="">Selecciona una marca</option>').prop('disabled', true);
                        },
                        error: function() {
                            alert('Error al obtener modelos.');
                        }
                    });
                } else {
                    $('#modelo').empty().append('<option value="">Selecciona un modelo</option>').prop('disabled', true);
                    $('#marca').empty().append('<option value="">Selecciona una marca</option>').prop('disabled', true);
                }
            });

            // Evento cuando cambia el select de modelo
            $('#modelo').change(function() {
                var modeloId = $(this).val(); // Obtener el ID del modelo seleccionado

                if (modeloId) {
                    $.ajax({
                        url: '/get-marcas/' + modeloId, // Ruta en Laravel para obtener las marcas
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#marca').empty().append('<option value="">Selecciona una marca</option>');

                            $.each(data, function(index, marca) {
                                $('#marca').append('<option value="' + marca.id + '">' + marca.nombre_marca + '</option>');
                            });

                            $('#marca').prop('disabled', false);
                        },
                        error: function() {
                            alert('Error al obtener marcas.');
                        }
                    });
                } else {
                    $('#marca').empty().append('<option value="">Selecciona una marca</option>').prop('disabled', true);
                }
            });
        });
    </script>
</body>

</html>
