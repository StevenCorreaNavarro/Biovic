<head>
    <link rel="icon" type="image/x-icon" href="IMG/logo.png">
</head>
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Crear cuenta</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>

                <span>Nombre de usuario y correo unicos</span>
                <x-input-label for="name" />
                <x-text-input id="name" placeholder="Nombre de usuario" class="block mt-1 w-full" type="text"
                    name="name" :value="old('name')" required autofocus autocomplete="name" />
                {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                    @error('name')
                    <div class="invalid-feedback" style="color: red;font-size:12px;">
                        Este nombre ya esta registrado, utiliza otro
                    </div>
                @enderror
                {{-- @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}

                <x-input-label for="email" />
                <x-text-input id="email" placeholder="E-mail" class="block mt-1 w-full" type="email"
                    name="email" :value="old('email')" required autocomplete="username" />
                {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                @error('email')
                    <div class="invalid-feedback" style="color: red; font-size:12px;">
                        Este correo esta registrado, utiliza otro
                    </div>
                @enderror


                <x-input-label for="password" />
                <x-text-input id="password" placeholder="Contraseña" class="block mt-1 w-full" type="password"
                    name="password" requiredautocomplete="new-password" />
                @error('password')
                    <div class="invalid-feedback" style="color: red;font-size:12px;">
                        agregar minimo 8 caracteres
                    </div>
                @enderror
                {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}


                <x-input-label for="password_confirmation" />
                <x-text-input id="password_confirmation" placeholder="Confirmar contraseña" class="block mt-1 w-full"
                    type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                @error('password')
                    <div class="invalid-feedback" style="color: red;font-size:12px;">
                        agregar minimo 8 caracteres
                    </div>
                @enderror

                <button class="custom-button">
                    {{ __('Registrar') }}
                </button>

                {{-- <input type="text" placeholder="Nombre">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Contraseña">
                <a href="/HTML/menu.html" class="custom-button" style="color: white;">Registrarse</a> --}}




            </form>
        </div>
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Inicio de sesión</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>


                <span>o usa tu email y contraseña</span>
                {{-- <x-input-label for="email" :value="__('Email')" /> --}}
                <x-input-label for="email" />
                <x-text-input placeholder="Email" id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autofocus autocomplete="username" />
                {{-- <x-input-error :messages="$errors->getemail')" class="mt-2" /> --}}

                <x-input-label for="password" />
                <x-text-input id="password" placeholder="Contraseña" class="block mt-1 w-full" type="password"
                    name="password" required autocomplete="current-password" />
                {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}

                @error('email')
                    <div class="invalid-feedback" style="color: red">
                        Correo o contraseña incorrectos
                    </div>
                @enderror


                {{-- <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label> --}}
                {{-- <a href="#">¿Olvidaste tu contraseña?</a> --}}


                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
                <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Ya estas registrado?') }}
                </a> -->

                <button class="custom-button">
                    {{ __('Ingresar') }}
                </button>



            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>¡Bienvenido de nuevo!</h1>
                    <img src="IMG/logobiomed.png" alt="" width="90"
                        height="auto">

                    <p>Ingrese sus datos personales para utilizar todas las funciones del sitio</p>
                    <button class="hidden" id="login">Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Biovimedic</h1>
                    <img src="IMG/logobiomed.png" alt="" width="90"
                        height="auto">
                    <p>Regístrate para explorar y conocer todos los beneficios que nuestra plataforma tiene para
                        ofrecerte. </p>


                    <button class="hidden" id="register">Registrarse</button>
                </div>
            </div>
        </div>

        {{-- <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form> --}}
    </div>
</x-guest-layout>
