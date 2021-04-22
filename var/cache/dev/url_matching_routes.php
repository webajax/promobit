<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/' => [[['_route' => 'app_user_index', '_controller' => 'App\\Controller\\UserController::index'], null, ['GET' => 0], null, false, false, null]],
        '/user/add' => [[['_route' => 'app_user_postadd', '_controller' => 'App\\Controller\\UserController::postAdd'], null, ['POST' => 0], null, false, false, null]],
        '/user/update' => [[['_route' => 'app_user_putupdate', '_controller' => 'App\\Controller\\UserController::putUpdate'], null, ['POST' => 0], null, false, false, null]],
        '/user/delete' => [[['_route' => 'app_user_postdelete', '_controller' => 'App\\Controller\\UserController::postDelete'], null, ['POST' => 0], null, false, false, null]],
        '/user/login' => [[['_route' => 'app_user_postlogin', '_controller' => 'App\\Controller\\UserController::postLogin'], null, ['POST' => 0], null, false, false, null]],
        '/user/restorepass' => [[['_route' => 'app_user_postrestorepass', '_controller' => 'App\\Controller\\UserController::postRestorePass'], null, ['GET' => 0], null, false, false, null]],
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
