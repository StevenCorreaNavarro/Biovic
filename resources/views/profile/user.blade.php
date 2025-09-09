


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de hoja de vida</title>
    <link rel="shortcut icon" href="/img/Logo_VitalTech2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/central.css">
    <link rel="icon" type="image/x-icon" href="/IMG/logotipo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
    <style>
            .form-containers {
            width: 540px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            align-items: center;
            text-align: center;
        }

        .profile-card {
            margin-top: 70px;
            position: relative;
            width: 420px;
            background: rgba(255, 255, 255, 0.9);
            -webkit-backdrop-filter: blur(48px);
            backdrop-filter: blur(48px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 12px 12px 12px -20px rgba(0, 0, 0, 0.645);
            /* transform: perspective(1000px) scale(0.8); adjust the scale to view properly */
            transform-style: preserve-3d;
        }

        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #f0f2f5;
            margin: 0 auto 1rem;
            overflow: hidden;
            border: 3px solid white;
            box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile-image::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 96px;
            background: linear-gradient(45deg, #0062E6, #33AEFF);
            border-radius: 20px 20px 0 0;
            z-index: -1;
        }

        .profile-info {
            text-align: left;
            margin-bottom: 1.5rem;
        }

        .profile-name {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 0.25rem;
        }

        .profile-title {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 0.0rem;
        }

        .profile-bio {
            font-size: 0.85rem;
            color: #777;
            line-height: 1.4;
            margin-bottom: 1.5rem;
        }

        .social-links {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            background: #f0f2f5;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .social-btn:hover {
            background: #e4e6e9;
            transform: translateY(-6px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .social-btn svg {
            width: 20px;
            height: 20px;
            fill: #1a1a1a;
            transition: all 0.2s ease;
        }

        .social-btn:hover svg {
            fill: #0066ff;
        }

        /* Specific colors for each social platform */
        .social-btn.twitter:hover svg {
            fill: #1da1f2;
        }

        .social-btn.instagram:hover svg {
            fill: #e4405f;
        }

        .social-btn.linkedin:hover svg {
            fill: #0a66c2;
        }

        .social-btn.github:hover svg {
            fill: #333333;
        }

        .cta-button {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 10px;
            background: linear-gradient(45deg, #0062E6, #33AEFF);
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition:
                transform 0.2s,
                background 0.2s;
        }

        .cta-button:hover {
            background: linear-gradient(45deg, #004298, #216d9f);
            transform: translateY(-2px);
        }

        .stats {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #eee;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-weight: 600;
            color: #1a1a1a;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #666;
        }
    </style>
</head>
<body>
    

@extends('layouts.header')

 <div style="        display: flex;
            justify-content: center;
            align-items: center;">




        <div class="profile-card">
            <div class="profile-image">
                @if (!empty($hdvs->foto) && Storage::exists('public/' . $hdvs->foto))
                    <img  src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto de perfil"
                        style=" width: 100%; height: 100%; object-fit: cover; ">
                @else
                    <svg fill="#000000" xml:space="preserve" viewBox="0 0 64 64" height="70px" width="70px"
                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                        version="1.0">
                        <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                        <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <path
                                    d="M18,12c0-5.522,4.478-10,10-10h8c5.522,0,10,4.478,10,10v7c0-3.313-2.687-6-6-6h-6c-2.209,0-4-1.791-4-4 c0-0.553-0.447-1-1-1s-1,0.447-1,1c0,2.209-1.791,4-4,4c-3.313,0-6,2.687-6,6V12z"
                                    fill="#506C7F"></path>
                                <path
                                    d="M62,60c0,1.104-0.896,2-2,2H4c-1.104,0-2-0.896-2-2v-8c0-1.104,0.447-2.104,1.172-2.828l-0.004-0.004 c4.148-3.343,8.896-5.964,14.046-7.714C20.869,45.467,26.117,48,31.973,48c5.862,0,11.115-2.538,14.771-6.56 c5.167,1.75,9.929,4.376,14.089,7.728l-0.004,0.004C61.553,49.896,62,50.896,62,52V60z"
                                    fill="#7d988a"></path>
                                <g>
                                    <path
                                        d="M32,42c-2.853,0-5.502-0.857-7.715-2.322c-1.675,0.283-3.325,0.638-4.934,1.097 C22.602,43.989,27.041,46,31.973,46c4.938,0,9.383-2.017,12.634-5.238c-1.595-0.454-3.231-0.803-4.892-1.084 C37.502,41.143,34.853,42,32,42z"
                                        fill="#F9EBB2"></path>
                                    <path
                                        d="M46,22h-1c-0.553,0-1-0.447-1-1v-1v-1c0-2.209-1.791-4-4-4h-6c-2.088,0-3.926-1.068-5-2.687 C27.926,13.932,26.088,15,24,15c-2.209,0-4,1.791-4,4v1v1c0,0.553-0.447,1-1,1h-1c-0.553,0-1,0.447-1,1v2c0,0.553,0.447,1,1,1h1 c0.553,0,1,0.447,1,1v1c0,6.627,5.373,12,12,12s12-5.373,12-12v-1c0-0.553,0.447-1,1-1h1c0.553,0,1-0.447,1-1v-2 C47,22.447,46.553,22,46,22z"
                                        fill="#F9EBB2"></path>
                                </g>
                                <path
                                    d="M62.242,47.758l0.014-0.014c-5.847-4.753-12.84-8.137-20.491-9.722C44.374,35.479,46,31.932,46,28 c1.657,0,3-1.343,3-3v-2c0-0.886-0.391-1.673-1-2.222V12c0-6.627-5.373-12-12-12h-8c-6.627,0-12,5.373-12,12v8.778 c-0.609,0.549-1,1.336-1,2.222v2c0,1.657,1.343,3,3,3c0,3.932,1.626,7.479,4.236,10.022c-7.652,1.586-14.646,4.969-20.492,9.722 l0.014,0.014C0.672,48.844,0,50.344,0,52v8c0,2.211,1.789,4,4,4h56c2.211,0,4-1.789,4-4v-8C64,50.344,63.328,48.844,62.242,47.758z M18,12c0-5.522,4.478-10,10-10h8c5.522,0,10,4.478,10,10v7c0-3.313-2.687-6-6-6h-6c-2.209,0-4-1.791-4-4c0-0.553-0.447-1-1-1 s-1,0.447-1,1c0,2.209-1.791,4-4,4c-3.313,0-6,2.687-6,6V12z M20,28v-1c0-0.553-0.447-1-1-1h-1c-0.553,0-1-0.447-1-1v-2 c0-0.553,0.447-1,1-1h1c0.553,0,1-0.447,1-1v-2c0-2.209,1.791-4,4-4c2.088,0,3.926-1.068,5-2.687C30.074,13.932,31.912,15,34,15h6 c2.209,0,4,1.791,4,4v2c0,0.553,0.447,1,1,1h1c0.553,0,1,0.447,1,1v2c0,0.553-0.447,1-1,1h-1c-0.553,0-1,0.447-1,1v1 c0,6.627-5.373,12-12,12S20,34.627,20,28z M24.285,39.678C26.498,41.143,29.147,42,32,42s5.502-0.857,7.715-2.322 c1.66,0.281,3.297,0.63,4.892,1.084C41.355,43.983,36.911,46,31.973,46c-4.932,0-9.371-2.011-12.621-5.226 C20.96,40.315,22.61,39.961,24.285,39.678z M62,60c0,1.104-0.896,2-2,2H4c-1.104,0-2-0.896-2-2v-8c0-1.104,0.447-2.104,1.172-2.828 l-0.004-0.004c4.148-3.343,8.896-5.964,14.046-7.714C20.869,45.467,26.117,48,31.973,48c5.862,0,11.115-2.538,14.771-6.56 c5.167,1.75,9.929,4.376,14.089,7.728l-0.004,0.004C61.553,49.896,62,50.896,62,52V60z"
                                    fill="#242424"></path>
                                <path
                                    d="M24.537,21.862c0.475,0.255,1.073,0.068,1.345-0.396C25.91,21.419,26.18,21,26.998,21 c0.808,0,1.096,0.436,1.111,0.458C28.287,21.803,28.637,22,28.999,22c0.154,0,0.311-0.035,0.457-0.111 c0.491-0.253,0.684-0.856,0.431-1.347C29.592,19.969,28.651,19,26.998,19c-1.691,0-2.618,0.983-2.9,1.564 C23.864,21.047,24.063,21.609,24.537,21.862z"
                                    fill="#242424"></path>
                                <path
                                    d="M34.539,21.862c0.475,0.255,1.073,0.068,1.345-0.396C35.912,21.419,36.182,21,37,21 c0.808,0,1.096,0.436,1.111,0.458C38.289,21.803,38.639,22,39.001,22c0.154,0,0.311-0.035,0.457-0.111 c0.491-0.253,0.684-0.856,0.431-1.347C39.594,19.969,38.653,19,37,19c-1.691,0-2.618,0.983-2.9,1.564 C33.866,21.047,34.065,21.609,34.539,21.862z"
                                    fill="#242424"></path>
                            </g>
                        </g>
                    </svg>
                @endif
            </div>
            <div class="profile-info">
                <p class="profile-name">{{ Auth::user()->name }}</p>

                @if (!empty(Auth::user()->email))
                    <div class="profile-title"><i class="bi bi-envelope-fill"></i> {{ Auth::user()->email}}</div>
                @endif

                @if (!empty(Auth::user()->contact))
                    <div class="profile-title"><i class="bi bi-whatsapp"></i> {{ Auth::user()->contact }}</div>
                @endif

                @if (!empty(Auth::user()->identity))
                    <div class="profile-title"><i class="bi bi-person-vcard"></i> {{ Auth::user()->identity }}</div>
                @endif
                @if (!empty(Auth::user()->adress))
                    <div class="profile-title"><i class="bi bi-house"></i>{{ Auth::user()->adress }}</div>
                @endif
                <br>

                <div class="profile-title"> Rol: {{ Auth::user()->role }}</div>

                <div class="profile-title">Codigo: {{ Auth::user()->codigo }}</div>



                @if (!empty(Auth::user()->profession))
                    <div class="profile-title">Profesion: {{ Auth::user()->profession }}</div>
                @endif


                @if (!empty(Auth::user()->post))
                    <div class="profile-title">Cargo: {{ Auth::user()->post }}</div>
                @endif
                <br>
                {{--                                                                 cambiar cuando se ponga                --}}
                @if (!empty($hdvs->email))
                    <div class="profile-bio">
                        Creative design and web enthusiast. Building digital experiences that
                        matter.
                    </div>
                @endif
            </div>
            <div class="social-links">
                <button class="social-btn twitter">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M22 4.01c-1 .49-1.98.689-3 .99-1.121-1.265-2.783-1.335-4.38-.737S11.977 6.323 12 8v1c-3.245.083-6.135-1.395-8-4 0 0-4.182 7.433 4 11-1.872 1.247-3.739 2.088-6 2 3.308 1.803 6.913 2.423 10.034 1.517 3.58-1.04 6.522-3.723 7.651-7.742a13.84 13.84 0 0 0 .497-3.753C20.18 7.773 21.692 5.25 22 4.009z">
                        </path>
                    </svg>
                </button>
                <button class="social-btn instagram">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M16.98 0a6.9 6.9 0 0 1 5.08 1.98A6.94 6.94 0 0 1 24 7.02v9.96c0 2.08-.68 3.87-1.98 5.13A7.14 7.14 0 0 1 16.94 24H7.06a7.06 7.06 0 0 1-5.03-1.89A6.96 6.96 0 0 1 0 16.94V7.02C0 2.8 2.8 0 7.02 0h9.96zm.05 2.23H7.06c-1.45 0-2.7.43-3.53 1.25a4.82 4.82 0 0 0-1.3 3.54v9.92c0 1.5.43 2.7 1.3 3.58a5 5 0 0 0 3.53 1.25h9.88a5 5 0 0 0 3.53-1.25 4.73 4.73 0 0 0 1.4-3.54V7.02a5 5 0 0 0-1.3-3.49 4.82 4.82 0 0 0-3.54-1.3zM12 5.76c3.39 0 6.2 2.8 6.2 6.2a6.2 6.2 0 0 1-12.4 0 6.2 6.2 0 0 1 6.2-6.2zm0 2.22a3.99 3.99 0 0 0-3.97 3.97A3.99 3.99 0 0 0 12 15.92a3.99 3.99 0 0 0 3.97-3.97A3.99 3.99 0 0 0 12 7.98z">
                        </path>
                    </svg>
                </button>
                <button class="social-btn linkedin">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M22.23 0H1.77C.8 0 0 .8 0 1.77v20.46C0 23.2.8 24 1.77 24h20.46c.98 0 1.77-.8 1.77-1.77V1.77C24 .8 23.2 0 22.23 0zM7.27 20.1H3.65V9.24h3.62V20.1zM5.47 7.76h-.03c-1.22 0-2-.83-2-1.87 0-1.06.8-1.87 2.05-1.87 1.24 0 2 .8 2.02 1.87 0 1.04-.78 1.87-2.05 1.87zM20.34 20.1h-3.63v-5.8c0-1.45-.52-2.45-1.83-2.45-1 0-1.6.67-1.87 1.32-.1.23-.11.55-.11.88v6.05H9.28s.05-9.82 0-10.84h3.63v1.54a3.6 3.6 0 0 1 3.26-1.8c2.39 0 4.18 1.56 4.18 4.89v6.21z">
                        </path>
                    </svg>
                </button>
                <button class="social-btn github">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z">
                        </path>
                    </svg>
                </button>
            </div>
             <a href="{{ route('user.editusers', ['user' => Auth::id()]) }}">
                <button  class="cta-button">Editar</button>
            {{-- <button  class="cta-button">Message</button> --}}
            <div class="stats">
                <div class="stat-item">
                    <div class="stat-value">15k</div>
                    <div class="stat-label">Followers</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">82</div>
                    <div class="stat-label">Posts</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">4.8</div>
                    <div class="stat-label">Rating</div>
                </div>
            </div>
        </div>

        {{-- @if (Auth::check() && Auth::user()->role === 'Admin')
            <a href="{{ route('user.editusers', ['user' => Auth::id()]) }}" class="btn btn-primary">
                <i class="bi bi-pencil-square"></i>
            </a>
        @endif --}}

    </div>
<!--
<div class=" d-flex flex-column justify-content-center align-items-center text-center ">
                <form class="d-flex m-2" style="background-color: rgb(239, 239, 239); width: 100%" method="GET"
                    action="{{ route('user.listausers') }}">

                    <input class="form-control m-2" class="form-control" style="width: 400px" type="text" name="search"
                        placeholder="Buscar..." value="{{ request('search') }}">

                    <button class="btn btn-primary m-2" type="submit"><i class="bi bi-search"></i></button> <a
                        href="{{ route('user.listausers') }}"class="bi bi-arrow-repeat btn btn-primary m-2"></a>
            </a> --}}
                </form>
            </div> -->
{{-- <main>
    <div class="form-containers"> --}}

        {{-- <center>
            <div class="cajon" id="formulario" action="{{ route('hojadevida.listar') }}">
                @if (Auth::check() && Auth::user()->foto)
                    <div
                        style=" position: relative;  width: 150px;  height: 150px;  overflow: hidden;  border-radius: 50%; overflow: hidden; border-radius: 50%; box-shadow: 0px 0px 10px 0px #333333e0; ">
                        <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto de perfil"
                            style=" width: 100%; height: 100%; object-fit: cover; "><br>
                    </div><br>
                    <h2 class=""> {{ Auth::user()->name }}</h2>
                @else
                    <h2 class="bi bi-person-circle bi bi bi bi "> {{ Auth::user()->name }}</h2>
                @endif
            </div>
        </center> --}}


        

        {{-- <span class="caret">Nombre: {{ Auth::user()->name }}</span><br> --}}
        {{-- <span class="user-level">E-mail: {{ Auth::user()->email }}</span><br>

        <span class="user-level">Rol: {{ Auth::user()->role }}</span><br>
        <span class="user-level">Identificacion: {{ Auth::user()->identity }}</span><br>
        <span class="user-level">Contacto: {{ Auth::user()->contact }}</span><br>
        <span class="user-level">Direccion: {{ Auth::user()->adress }}</span><br>
        <span class="user-level">Profesion: {{ Auth::user()->profession }}</span><br>
        <span class="user-level">Cargo: {{ Auth::user()->post }}</span><br> <br> --}}

        {{-- <table class="table table-borderless table-striped">

            <tbody>
                <thead>
                
                </thead>
                <tr>
                    <th></th>
                    <th>E-mail: </th>
                    <td> {{ Auth::user()->email }}</td>
                    <th></th>

                </tr>
                <tr>
                    <th></th>
                    <th>Rol: </th>
                    <td>{{ Auth::user()->role }}</td>
                    <th></th>

                </tr>
                <tr>
                    <th></th>
                    <th>Identificacion: </th>
                    <td>{{ Auth::user()->identity }}</td>
                    <th></th>

                </tr>
                <tr>
                    <th></th>
                    <th>Contacto: </th>
                    <td>{{ Auth::user()->contact }}</td>
                    <th></th>

                </tr>
                <tr>
                    <th></th>
                    <th>Direcccion: </th>
                    <td>{{ Auth::user()->adress }}</td>
                    <th></th>

                </tr>
                <tr>
                    <th></th>
                    <th>Profesion: </th>
                    <td>{{ Auth::user()->profession }}</td>
                    <th></th>

                </tr>
                <tr>
                    <th></th>
                    <th>Cargo: </th>
                    <td>{{ Auth::user()->post }}</td>
                    <th></th>

                </tr>
            </tbody>
        </table> --}}
        {{-- <a href="{{ route('user.editusers', ['user' => Auth::id()]) }}" class="btn btn-primary">
            <i class="bi bi-pencil-square"></i>
        </a> --}}
    {{-- </div> --}}

</main>

<footer class="bg-primary text-white text-center py-4" style="margin-top: 5%;">
    <div class="container">
        <h4>Vitalsoft</h4>
        <p>&copy; Soluciones biomedicas a la medida</p>
        <div class="my-3">
            <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>
<script>
    // Esperar a que el DOM se cargue
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.querySelector('.needs-validation');
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            // Añadir la clase 'was-validated' al formulario
            form.classList.add('was-validated');
        }, false);
    });
</script>
<!-- SweetAlert2 desde CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Hecho',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif

</body>

</html>







   