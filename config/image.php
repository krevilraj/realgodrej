<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',
    'sizes' => [
        'small' => ['100', '100'],
        'mediumCat' => ['230', '230'],
        'mediumBlog' => ['450', '277'],
        'medium' => ['340', '382'],
        'large' => ['700', '700'],
        'single' => ['470', '385'],
        'largeSlideshow' => ['1349', '400'],
    ],

);
