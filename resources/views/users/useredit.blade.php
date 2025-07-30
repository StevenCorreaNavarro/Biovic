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
    <link rel="stylesheet" href="{{ asset('css/central.css') }}">
    <title>Title</title>
    <style>
        label {
            width: 60%;

        }

        .form-containers {
            width: 740px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            align-items: center;
            text-align: center;
        }
    </style>
</head>

<body>
    @extends('layouts.header')
    <br><br><br><br><br>
    <main>
        <div class="form-containers">

            <form action="{{ route('user.updateusers', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <h1> Editar usuario</h1>


                <script>
                    function previewImage(event) {
                        let reader = new FileReader();
                        reader.onload = function() {
                            let preview = document.getElementById('preview');
                            preview.src = reader.result;
                            preview.style.display = 'block';
                        }
                        reader.readAsDataURL(event.target.files[0]);
                    }
                </script>





                <div class="col-md-12 position-relative">
                    <div class="form-group">
                        @if (Auth::check() && Auth::user()->role === 'Admin')
                            <label for="role" class="form-label">
                                <span>Rol (User, Empleado, Admin)</span>
                                <br>
                                {{-- <input class="form-control" type="text" name="role"
                                    value="{{ old('role', $user->role) }}"> --}}
                                <select name="role" id="role" class="form-control" required>
                                    <option value="{{ old('role', $user->role) }}">{{ Auth::user()->role }}</option>
                                    <br>
                                    {{-- <option value="User">User</option>
                                    <option value="Empleado">Empleado</option>
                                    <option value="Admin">Admin</option> --}}
                                </select>
                            </label>
                        @else
                            <label for="role" class="form-label">
                                <span>Rol (User, Empleado, Admin)</span>
                                <br>
                                {{-- <input class="form-control" type="text" name="role"
                                    value="{{ old('role', $user->role) }}"> --}}
                                <select name="role" id="role" class="form-control" required>
                                    <option value="{{ old('role', $user->role) }}">{{ Auth::user()->role }}</option>
                                </select>
                            </label>
                        @endif
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
                <div class="col-md-12 position-relative">
                    <div class="form-group">
                        <label class="form-label">
                            <span>Imagen</span>
                            <br>
                            <div class="d-flex  ">
                                <div>
                                    <input type="file" name="foto" id="foto"
                                        class="form-control @error('foto') is-invalid @enderror" accept="image/*"
                                        onchange="previewImage(event)">
                                </div>
                                <div class="d-flex">
                                    <img id="preview" class="img-thumbnail " width="120" style="display: none;"
                                        alt="Vista previa">
                                </div>
                            </div>
                            @error('foto')
                                <div class="invalid-feedback">El campo es obligatorio</div>
                            @enderror
                        </label>
                    </div>
                </div>
                <br><br>

                <button class="btn btn-primary" type="submit">Enviar Formulario:</button>

            </form>
        </div>

    </main>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>
