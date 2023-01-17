<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    'app_api' => [[], ['_controller' => 'App\\Controller\\ApiController::index'], [], [['text', '/api']], [], [], []],
    'add_device' => [[], ['_controller' => 'App\\Controller\\ApiController::create'], [], [['text', '/api/v1/add_device']], [], [], []],
    'update_device' => [['id'], ['_controller' => 'App\\Controller\\ApiController::update'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/v1/update_device']], [], [], []],
    'delete_device' => [['id'], ['_controller' => 'App\\Controller\\ApiController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/v1/delete_device']], [], [], []],
    'list_device' => [[], ['_controller' => 'App\\Controller\\ApiController::list'], [], [['text', '/api/v1/device']], [], [], []],
    'get_device' => [['id'], ['_controller' => 'App\\Controller\\ApiController::showDevice'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/v1/get_device']], [], [], []],
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
];