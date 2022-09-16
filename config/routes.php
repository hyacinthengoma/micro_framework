<?php

const ROUTES = [
    'home' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'home'
    ],

    'test' => [
        'controller' => App\Controller\OfferController::class,
        'method' => 'test'
    ],
    'privacy' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'privacy'
    ],
];
