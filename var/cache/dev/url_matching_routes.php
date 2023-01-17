<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api' => [[['_route' => 'app_api', '_controller' => 'App\\Controller\\ApiController::index'], null, null, null, false, false, null]],
        '/api/v1/add_device' => [[['_route' => 'add_device', '_controller' => 'App\\Controller\\ApiController::create'], null, ['POST' => 0], null, false, false, null]],
        '/api/v1/device' => [[['_route' => 'list_device', '_controller' => 'App\\Controller\\ApiController::list'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api/v1/(?'
                    .'|update_device/([^/]++)(*:40)'
                    .'|delete_device/([^/]++)(*:69)'
                    .'|get_device/([^/]++)(*:95)'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:131)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        40 => [[['_route' => 'update_device', '_controller' => 'App\\Controller\\ApiController::update'], ['id'], ['PUT' => 0], null, false, true, null]],
        69 => [[['_route' => 'delete_device', '_controller' => 'App\\Controller\\ApiController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        95 => [[['_route' => 'get_device', '_controller' => 'App\\Controller\\ApiController::showDevice'], ['id'], ['GET' => 0], null, false, true, null]],
        131 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
