<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Laravel CORS
     |--------------------------------------------------------------------------
     |

     | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
     | to accept any value.
     |
     */
    'supportsCredentials' => false,
    'allowedOrigins' => ['*'], //* Todas as origins de acesso
    'allowedHeaders' => ['*'], //* Todas as headers de acesso
    'allowedMethods' => ['*'], //* Todas as métodos de acesso
    'exposedHeaders' => [],
    'maxAge' => 0,
    'hosts' => [],
];

