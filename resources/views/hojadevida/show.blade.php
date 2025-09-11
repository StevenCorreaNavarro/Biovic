<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista HDV PDF</title>

    <style>
        .centro {
             margin-top:120px;
            /* visibility: hidden; */
            /* opacity: 0; */
            position: absolute;
            padding: 10%;
            /* padding-right: 0;
            margin-right: 0; */
            height: 100%;

            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            /* background-color: rgba(0, 0, 0, 0.1); */
           
            display: flex;
            justify-content: center;
            align-items: center;
            /* transition: visibility 0.3s, opacity 0.3s; */
            /* z-index: 1000; */
            padding-top: 150px;
            
           

        }
        .papel{
                        z-index: 1000;
             background-color: white;
            height: 279.4mm;
            padding: 55px;
            margin: 55px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow:6px 10px 10px rgba(0, 0, 0, 0.21);
           

        }

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
            /* justify-content: center;
            align-items: center; */
            /* position: absolute; */
            /* display: flex; */
            flex-direction: column;
            gap: 15px;
            /* opacity: 0; */
            position: absolute;

            top: 10px;
            right: 0;
            bottom: 0;
            left: 1000px;
            /* background-color: rgba(0, 0, 0, 0.7); */
            display: flex;
            justify-content: center;
            align-items: center;
            /* transition: visibility 0.3s, opacity 0.3s; */
            /* z-index: 1000; */
            /* padding-top: 300px; */

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
                .buttone:after {
            content: " ";
            width: 0%;
            height: 100%;
            background: linear-gradient(45deg, #eabc02, #fcd01c);
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

        .boton-abrir {
            padding: 10px 20px;
            /* background-color: #007bff; */
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        /* El contenedor del modal (fondo oscuro) */
        .modal-container {
            visibility: hidden;
            opacity: 0;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            transition: visibility 0.3s, opacity 0.3s;
            z-index: 1000;
        }

        /* Estilos del modal en sí */
        .modal {
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            transform: scale(0.9);
            transition: transform 0.3s ease-out;
        }

        /* La magia: mostrar el modal cuando el URL apunta a su ID */
        .modal-container:target {
            visibility: visible;
            opacity: 1;
        }

        /* Animación de entrada para el modal */
        .modal-container:target .modal {
            transform: scale(1);
        }

        /* Estilos para el botón de cerrar */
        .boton-cerrar {
            display: block;
            margin-top: 20px;
            text-align: right;
            color: #ffffff;
            text-decoration: none;
            background: #0062E6;
        }

      
    </style>
</head>

<body style="background-color: rgba(0, 0, 0, 0.1);">


    <div class="centro pdf">
        <div class="papel">
        @include('hojadevida.showpdf')
        </div>
        
    </div>

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
              @if (Auth::check() && Auth::user()->role === 'Admin')
            <div class="card">
                <a href="{{ url('hojadevida/' . $hdvs->id . '/edit') }}">
                    <button class="buttone">

                        <span class="tip">Editar</span>
                        {{-- <img src="{{ asset('IMG/pdf.png') }}" alt="" width="40px" height="40px"> --}}
                    </button>
                </a>
            </div>
            @endif
            <div class="card">
                <a href="{{ url('hojadevida/create') }}">
                    <button class="button">

                        <span class="tip">Nuevo</span>
                        {{-- <img src="{{ asset('IMG/pdf.png') }}" alt="" width="40px" height="40px"> --}}
                    </button>
                </a>
            </div>
            <div class="card">
                <a href="{{ url('hojadevida/listar') }}">
                    <button class="button">

                        <span class="tip">Lista</span>
                        {{-- <img src="{{ asset('IMG/pdf.png') }}" alt="" width="40px" height="40px"> --}}
                    </button>
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
              @if (Auth::check() && Auth::user()->role === 'Admin')

            <div class="">
                <a href="#modal-abierto" class="boton-abrir">
                    <button class="buttonr">

                        <span class="tip">Eliminar</span>
                        {{-- <img src="{{ asset('IMG/pdf.png') }}" alt="" width="40px" height="40px"> --}}
                    </button>
                </a>
            </div>
            @endif
        </div>
          @if (Auth::check() && Auth::user()->role === 'Admin')
        <div id="modal-abierto" class="modal-container">
            <div class="modal">
                <h2>¡Eliminar HOJA DE VIDA!</h2>
                <p>¿Seguro que deseas eliminar esta Hoja de Vida?</p>
                <div style="display: flex;justify-content: center;
            align-items: center;
            text-align: center;" class="">
                    {{-- <a href="#" class="boton-cerrar">Cancelar</a>
                    <a href="#" class="boton-cerrar">Eliminar</a> --}}
                    <a href="#">
                        <button style="width: 120px; height: 40px; margin:10px;" class="button">
                            <span class="tip">Cancelar</span>

                        </button>
                    </a>
                    <a href="#">
                        <button style="width: 120px; height: 40px; margin:10px;" class="buttonr">
                            <span class="tip">Eliminar</span>
                        </button>
                    </a>


                </div>

            </div>
        </div>
@endif


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