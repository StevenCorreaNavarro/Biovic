<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    {{-- <link rel="stylesheet" href="css/hoja_ver.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>Title</title>
    <style>
        label {
            width: 60%;
            
        }
      
    </style>
</head>

<body>

    @extends('admin.admin.layouts.app')
    @section('content')
    <main>
        <div class="form-container ">
            <form action="{{ route('user.updateuser', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <h1> Editar usuario</h1>
                <div class="col-md-12 position-relative">
                    <div class="form-group">
                        <label class="form-label">
                            <span>Rol (user, empleado, admin)</span>
                            <br>
                            <input class="form-control" type="text" name="role"
                                value="{{ old('role', $user->role) }}">
                        </label>
                    </div>
                </div>

                <div class="col-md-12 position-relative">
                    <div class="form-group">
                        <label class="form-label">
                            <span>Nombre</span>
                            <br>
                            <input class="form-control" type="text" name="name"
                                value="{{ old('name', $user->name) }}">
                        </label>
                    </div>
                </div>


                {{-- <label class="form-label">
           
            <br>
            <input class="form-control" type="password" name="password" value="{{ old( $user->password) }}">
                </label> --}}

                <div class="col-md-12 position-relative">
                    <div class="form-group">

                        <label class="form-label ">
                            <span>e-mail</span>
                            <br>
                            <input class="form-control " type="text" name="email"
                                value="{{ old('email', $user->email) }}">
                        </label>
                    </div>
                </div>


                <div class="col-md-12 position-relative">
                    <div class="form-group">
                        <label class="form-label">
                            <span>N. identificacion</span>
                            <br>
                            <input class="form-control" type="text" name="identity"
                                value="{{ old('identity', $user->identity) }}">
                        </label>
                    </div>
                </div>
                <div class="col-md-12 position-relative">
                    <div class="form-group">
                        <label class="form-label">
                            <span>Foto</span>
                            <br>
                            <input class="form-control" type="text" name="foto"
                                value="{{ old('foto', $user->foto) }}">
                        </label>
                    </div>
                </div>
                <div class="col-md-12 position-relative">
                    <div class="form-group">
                        <label class="form-label">
                            <span>Contact</span>
                            <br>
                            <input class="form-control" type="text" name="contact"
                                value="{{ old('contact', $user->contact) }}">
                        </label>
                    </div>
                </div>

                <div class="col-md-12 position-relative">
                    <div class="form-group">
                        <label class="form-label">
                            <span>Direccion</span>
                            <br>
                            <input class="form-control" type="text" name="adress"
                                value="{{ old('adress', $user->adress) }}">
                        </label>
                    </div>
                </div>
                <div class="col-md-12 position-relative">
                    <div class="form-group">
                        <label class="form-label">
                            <span>Profesion</span>
                            <br>
                            <input class="form-control" type="text" name="profession"
                                value="{{ old('profession', $user->profession) }}">
                        </label>
                    </div>
                </div>
                <div class="col-md-12 position-relative">
                    <div class="form-group">
                        <label class="form-label">
                            <span>Cargo</span>
                            <br>
                            <input class="form-control" type="text" name="post"
                                value="{{ old('post', $user->post) }}">
                        </label>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Enviar Formulario:</button>

            </form>
        </div>

    </main>
    @endsection



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>