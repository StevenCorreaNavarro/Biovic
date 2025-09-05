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

        /* .cards .red {
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
        } */

        .cards .card {
            margin-bottom: 12px;
            
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

        /* .cards:hover>.card:not(:hover) {
            filter: blur(1px);
            transform: scale(0.9, 0.9);
            
        } */







        button {
            width: 250px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            background: #183153;
            font-family: "Montserrat", sans-serif;
            /* box-shadow: 0px 6px 24px 0px rgba(0, 0, 0, 0.2); */
            overflow: hidden;
            cursor: pointer;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.336);
        }

        button:after {
            content: " ";
            width: 0%;
            height: 100%;
            background: linear-gradient(45deg, #0062E6, #33AEFF);
            color: #fff;
            position: absolute;
            transition: all 0.4s ease-in-out;
            right: 0;
        }
        .buttonr:after {
            content: " ";
            width: 0%;
            height: 100%;
            background: linear-gradient(45deg, #c70000, #ff3333);
            color: #fff;
            position: absolute;
            transition: all 0.4s ease-in-out;
            right: 0;
        }
        .buttonv:after {
            content: " ";
            width: 0%;
            height: 100%;
            background: linear-gradient(45deg, #3cc700, #41ff33);
            color: #fff;
            position: absolute;
            transition: all 0.4s ease-in-out;
            right: 0;
        }

        button:hover::after {
            right: auto;
            left: 0;
            width: 100%;
        }

        button span {
            text-align: center;
            text-decoration: none;
            width: 100%;
            padding: 18px 25px;
            color: #fff;
            font-size: 1.125em;
            font-weight: 700;
            letter-spacing: 0.3em;
            z-index: 20;
            transition: all 0.3s ease-in-out;
        }

        button:hover span {
            color: #ffffff;
            animation: scaleUp 0.3s ease-in-out;
        }

        @keyframes scaleUp {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(0.95);
            }

            100% {
                transform: scale(1);
            }
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
              
           
               
                <div class="card">
                    <a href="{{ url('descargar-pdf' . '/' . $hdvs->id) }}" target="_blank">
                    <button class="buttonv">
                      
                        <span class="tip">Descargar</span>
                        {{-- <img src="{{ asset('IMG/pdf.png') }}" alt="" width="40px" height="40px"> --}}
                    </button>
                    </a>
                </div>
                <div class="card">
                    <a href="{{ url('descargar-pdf' . '/' . $hdvs->id) }}" target="_blank">
                    <button class="button">
                      
                        <span class="tip">Editar</span>
                        {{-- <img src="{{ asset('IMG/pdf.png') }}" alt="" width="40px" height="40px"> --}}
                    </button>
                    </a>
                </div>
                 <div class="card">
                    <a href="{{ url('descargar-pdf' . '/' . $hdvs->id) }}" target="_blank">
                    <button class="button">
                      
                        <span class="tip">Nuevo</span>
                        {{-- <img src="{{ asset('IMG/pdf.png') }}" alt="" width="40px" height="40px"> --}}
                    </button>
                    </a>
                </div>
                <div class="card">
                    <a  href="{{ url('hojadevida/listar') }}">
                    <button class="button">
                      
                        <span class="tip">Lista</span>
                        {{-- <img src="{{ asset('IMG/pdf.png') }}" alt="" width="40px" height="40px"> --}}
                    </button>
                    </a>
                </div>




               

                  
                <div class="">

                    <a >
                        <i class="bi bi-download"></i>
                        <span class="tip"></span>
                    </a>

                </div>
                <div class="">

                    <a>
                        <i class="bi bi-download"></i>
                        <span class="tip"></span>
                    </a>

                </div>
                <div class="">

                    <a >
                        <i class="bi bi-download"></i>
                        <span class="tip"></span>
                    </a>

                </div>
                <div class="">

                    <a>
                        <i class="bi bi-download"></i>
                        <span class="tip"></span>
                    </a>

                </div>
                <div class="">

                    <a>
                        <i class="bi bi-download"></i>
                        <span class="tip"></span>
                    </a>

                </div>
                <div class="">

                    <a>
                        <i class="bi bi-download"></i>
                        <span class="tip"></span>
                    </a>

                </div>
                <div class="">

                    <a>
                        <i class="bi bi-download"></i>
                        <span class="tip"></span>
                    </a>

                </div>
                <div class="">

                    <a >
                        <i class="bi bi-download"></i>
                        <span class="tip"></span>
                    </a>

                </div>
                <div class="">

                    <a >
                        <i class="bi bi-download"></i>
                        <span class="tip"></span>
                    </a>

                </div>
                <div class="">

                    <a >
                        <i class="bi bi-download"></i>
                        <span class="tip"></span>
                    </a>

                </div>
                <div class="">

                    <a >
                        <i class="bi bi-download"></i>
                        <span class="tip"></span>
                    </a>

                </div>
                
                <div class="">
                    <a >
                    <button class="buttonr">
                      
                        <span class="tip">Eliminar</span>
                        {{-- <img src="{{ asset('IMG/pdf.png') }}" alt="" width="40px" height="40px"> --}}
                    </button>
                    </a>
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
