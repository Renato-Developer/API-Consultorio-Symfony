<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/especialidades' => [
            [['_route' => 'app_especialidades_novaespecialidade', '_controller' => 'App\\Controller\\EspecialidadesController::novaEspecialidade'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_especialidades_buscarespecialidades', '_controller' => 'App\\Controller\\EspecialidadesController::buscarEspecialidades'], null, ['GET' => 0], null, false, false, null],
        ],
        '/medicos' => [
            [['_route' => 'app_medico_novomedico', '_controller' => 'App\\Controller\\MedicoController::novoMedico'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_medico_buscarmedicos', '_controller' => 'App\\Controller\\MedicoController::buscarMedicos'], null, ['GET' => 0], null, false, false, null],
        ],
        '/ola' => [[['_route' => 'app_olamundo_olamundo', '_controller' => 'App\\Controller\\OlaMundoController::olaMundoAction'], null, null, null, false, false, null]],
        '/hello' => [[['_route' => 'app_olamundo_hello', '_controller' => 'App\\Controller\\OlaMundoController::helloAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/especialidades/([^/]++)(?'
                    .'|(*:34)'
                .')'
                .'|/medicos/([^/]++)(?'
                    .'|(*:62)'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:98)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        34 => [
            [['_route' => 'app_especialidades_especialidadeporid', '_controller' => 'App\\Controller\\EspecialidadesController::especialidadePorId'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_especialidades_atualizarespecialidade', '_controller' => 'App\\Controller\\EspecialidadesController::atualizarEspecialidade'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'app_especialidades_removerespecialidade', '_controller' => 'App\\Controller\\EspecialidadesController::removerEspecialidade'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        62 => [
            [['_route' => 'app_medico_medicoporid', '_controller' => 'App\\Controller\\MedicoController::medicoPorId'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_medico_atualizarmedico', '_controller' => 'App\\Controller\\MedicoController::atualizarMedico'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'app_medico_removermedico', '_controller' => 'App\\Controller\\MedicoController::removerMedico'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        98 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
