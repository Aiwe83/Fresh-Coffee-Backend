<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    //CORS (Cross-Origin Resource Sharing) en Laravel es un mecanismo de seguridad que permite a los
    // navegadores web restringir las solicitudes HTTP realizadas desde scripts en un dominio diferente
    // al del recurso solicitado. Al crear una API en Laravel, habilitar CORS es beneficioso al permitir
    // que las aplicaciones frontend, como las desarrolladas en React, puedan realizar solicitudes a la API
    // desde dominios diferentes al del servidor en el que se encuentra alojada la API.

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true, //Se cambia de false a true y asi ya no tendremos el error XMLHttpRequest has been blocked by CORS policy

];
