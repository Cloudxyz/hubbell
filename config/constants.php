<?php

return [

    'roles' => [
        'super' => 1,
        'admin' => 2,
        'provider' => 3,
        'regular' => 4,
    ],

    'pagination' => [
        'per-page' => 50
    ],

    'thumbnails' => [
        'thumbnail' => [
            'width' => 150,
            'height' => 150,
        ],
        'small' => [
            'width' => 300,
            'height' => 300,
        ],
        'medium' => [
            'width' => 700,
            'height' => 700,
        ],
        'large' => [
            'width' => 1000,
            'height' => 650,
        ],
    ],

    'valid_image_types' => ['jpg', 'jpeg', 'png', 'bmp'],
];
