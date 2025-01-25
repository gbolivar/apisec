<?php

return [
    'paths'                    => ['api/*', 'sanctum/csrf-cookie'], // Aplica a todas las rutas API y Sanctum si se usa
    'allowed_methods'          => ['*'], // Permitir todos los métodos (GET, POST, PUT, DELETE, etc.)
    'allowed_origins'          => ['*'], // Permitir todas las orígenes
    'allowed_origins_patterns' => [], // Expresiones regulares para orígenes específicos (opcional)
    'allowed_headers'          => ['*'], // Permitir todos los encabezados
    'exposed_headers'          => [], // Encabezados adicionales que quieres exponer
    'max_age'                  => 0, // Tiempo en segundos para almacenamiento en caché de las respuestas preflight
    'supports_credentials'     => false, // Cambiar a true si necesitas admitir credenciales como cookies
];
