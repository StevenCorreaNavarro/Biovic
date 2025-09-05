<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('IMG/logo.png') }}">

    <title>Hoja de vida PDF</title>
    <style>
        /* .b {
            width: 20%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
           
            position: absolute;
            top: 250px;
        }

        .b h1 {
            font-size: 30px;
            font-weight: bold;
            color: #333333c6;
            text-align: center;
            margin-top: 20px;
          
        } */

        a {
            /* margin-top: 20px;

            background-color: blue;
            color: white;
            padding: 10px; */
             color: white;
            text-decoration: none;
            /* border-radius: 5px;
            font-size: 20px;
            font-weight: bold;
            position: absolute;
            top: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.189); */

        }

        /* a:hover {
            background-color: #0056b3;
            color: white;
            text-decoration: none;
            box-shadow: 0 4px 18px rgba(255, 255, 255, 0.246);
        } */





        .cards {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .cards .red {
            background-color: #f43f5e;
        }

        .cards .blue {
            background-color: #3b82f6;
        }

        .cards .green {
            background-color: #22c55e;
        }
        .cards .yellow {
            background-color: #e0c009;
        }

        .cards .card {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            height: 40px;
            width: 250px;
            border-radius: 10px;
            color: white;
            cursor: pointer;
            transition: 400ms;
        }

        .cards .card p.tip {
            font-size: 2em;
            font-weight: 700;
        }

        .cards .card p.second-text {
            font-size: .7em;
        }

        .cards .card:hover {
            transform: scale(1.1, 1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.336);
        }

        .cards:hover>.card:not(:hover) {
            filter: blur(5px);
            transform: scale(0.9, 0.9);
            
        }
    </style>
</head>

<body>

    <div>
        <div>
            @include('hojadevida.showpdf')
        </div>

        {{-- <div class="a" style="padding-left: 890px">
                <h1> Registrar </h1>
                <a href="{{ url('hojadevida/create') }}" class="btn btn-primary m-2">
                    Ingresar Nueva hoja de vida
                </a>
            </div>  --}}

        <div class="b" style="padding-left: 850px">


            <div class="cards">
                  <div class="card yellow">
                     <a   href="{{ url('descargar-pdf' . '/' . $hdvs->id) }}"  target="_blank">
                        {{-- <i class="bi bi-download"></i> --}}
                        <p class="tip">Descargar PDF</p>
                        {{-- <img src="{{ asset('IMG/pdf.png') }}" alt="" width="40px" height="40px"> --}}
                    </a>
                </div>
                
                

                
                <div class="card green">
                    
                     <a {{--  href="{{ url('descargar-pdf' . '/' . $hdvs->id) }}" --}}>
                        <i class="bi bi-download"></i>
                        <p class="tip">Editar</p>
                    </a>
                </div>
               <div class="card red">
                    
                    <a  {{--  href="{{ url('descargar-pdf' . '/' . $hdvs->id) }}" --}}>
                        <i class="bi bi-download"></i>
                        <p class="tip">Eliminar</p>
                    </a>
                    
                </div>
                <div class="card blue">
                    
                    <a  href="{{ url('hojadevida/create') }}" >
                        <i class="bi bi-download"></i>
                        <p class="tip">Nueva hoja de vida</p>
                    </a>
                    
                </div>
            </div>
        </div>



        {{-- @if ((Auth::check() && Auth::user()->role === 'Admin') || Auth::user()->role === 'Empleado')
            <div class="b" style="padding-left: 780px; ">
                <!-- <h1>Hoja de Vida PDF</h1> -->
                <a href="#" target="_blank">Editar
                    <i class="bi bi-download"></i>
                </a>
            </div>
        @endif
        @if (Auth::check() && Auth::user()->role === 'Admin')
            <div class="b" style="padding-left: 880px;">
                <!-- <h1>Hoja de Vida PDF</h1> -->
                <a href=" #" target="_blank">Eliminiar
                    <i class="bi bi-download"></i>
                </a>
            </div>
        @endif --}}

    </div>


</body>

</html>
