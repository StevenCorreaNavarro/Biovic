<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        a{
            margin: 10%;
            background-color: blue;
            padding: 5%;
            color: wheat;
            font-size: 30px;
        }
        .box1{
            width: 10%;

        }
    </style>
</head>

<body>
    <center>
        <div class="contenedor" >
            <div class="box">
                @include('hojadevida.showpdf')
            </div>
            <div style="padding-left: 500px" class="box1">
                
                <a href="{{ url('descargar-pdf' . '/' . $hdvs->id) }}"
                    target="_blank">descargar
                    <i class="bi bi-download"></i>
                </a>
            </div>
        </div>
    </center>

</body>

</html>
