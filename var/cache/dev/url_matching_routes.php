<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/medicos' => [
            [['_route' => 'app_medico_novomedico', '_controller' => 'App\\Controller\\MedicoController::novoMedico'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_medico_buscarmedicos', '_controller' => 'App\\Controller\\MedicoController::buscarMedicos'], null, ['GET' => 0], null, false, false, null],
        ],
        '/ola' => [[['_route' => 'app_olamundo_olamundo', '_controller' => 'App\\Controller\\OlaMundoController::olaMundoAction'], null, null, null, false, false, null]],
        '/hello' => [[['_route' => 'app_olamundo_hello', '_controller' => 'App\\Controller\\OlaMundoController::helloAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/medicos/([^/]++)(?'
                    .'|(*:27)'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:63)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        27 => [
            [['_route' => 'app_medico_medicoporid', '_controller' => 'App\\Controller\\MedicoController::medicoPorId'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_medico_atualizarmedico', '_controller' => 'App\\Controller\\MedicoController::atualizarMedico'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'app_medico_removermedico', '_controller' => 'App\\Controller\\MedicoController::removerMedico'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        63 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
