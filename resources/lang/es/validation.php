<?php

return [

    // ... otras reglas

    'unique' => 'El :attribute ya ha sido registrado.',

    // ... otras reglas

    'custom' => [
        'email' => [
            'unique' => 'Este correo ya ha sido registrado por otro usuario.',
        ],
        'name' => [
            'unique' => 'El nombre de usuario no está disponible.',
        ],
    ],
];