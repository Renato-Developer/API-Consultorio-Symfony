<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/medico' => [[['_route' => 'app_medico_novo', '_controller' => 'App\\Controller\\MedicoController::novo'], null, ['POST' => 0], null, false, false, null]],
        '/ola' => [[['_route' => 'app_olamundo_olamundo', '_controller' => 'App\\Controller\\OlaMundoController::olaMundoAction'], null, null, null, false, false, null]],
        '/hello' => [[['_route' => 'app_olamundo_hello', '_controller' => 'App\\Controller\\OlaMundoController::helloAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
