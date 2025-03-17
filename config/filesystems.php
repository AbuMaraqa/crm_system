<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 6/22/24, 10:52 PM.
 * @Project: Jumla
 ************************************************/

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root'   => storage_path('app'),
            'throw'  => false,
        ],

//        'public' => [
//            'driver'     => 'local',
//            'root'       => storage_path('app/public'),
//            'url'        => env('APP_URL') . '/storage',
//            'visibility' => 'public',
//            'throw'      => false,
//        ],

        'media' => [
            'driver' => 'local',
            'root'   => storage_path('app/public/media'),
            'url'    => env('APP_URL') . '/media',
            'path'   => '/media/',

            'visibility' => 'public',
            'throw'      => false,
        ],

        'base' => [
            'driver' => 'local',
            'root'   => base_path(),
        ],

        'favicons' => [
            'driver'     => 'local',
            'root'       => base_path('/public/favicons/'),
            'url'        => env('APP_URL') . '/favicons/',
            'path'       => '/favicons/',
            'visibility' => 'public',
        ],

        'dashboard_users' => [
            'driver'     => 'local',
            'root'       => base_path('/public/dashboard/users'),
            'url'        => env('APP_URL') . '/dashboard/users',
            'path'       => '/dashboard/users/',
            'visibility' => 'public',
        ],


        'products' => [
            'driver'     => 'local',
            'root'       => storage_path('app/public/media/products'),
            'url'        => env('APP_URL') . '/media/products',
            'path'       => '/media/products',
            'visibility' => 'public',
            'throw'      => false,
        ],

        'product_categories' => [
            'driver'     => 'local',
            'root'       => storage_path('app/public/media/product-categories'),
            'url'        => env('APP_URL') . '/media/product-categories',
            'path'       => '/media/product-categories',
            'visibility' => 'public',
            'throw'      => false,
        ],

        'brands' => [
            'driver'     => 'local',
            'root'       => storage_path('app/public/media/brands'),
            'url'        => env('APP_URL') . '/media/brands',
            'path'       => '/media/brands',
            'visibility' => 'public',
            'throw'      => false,
        ],

        'product_attributes' => [
            'driver'     => 'local',
            'root'       => storage_path('app/public/media/product-attributes'),
            'url'        => env('APP_URL') . '/media/product-attributes',
            'path'       => '/media/product-attributes',
            'visibility' => 'public',
            'throw'      => false,
        ],

        'banners' => [
            'driver'     => 'local',
            'root'       => storage_path('app/public/media/banners'),
            'url'        => env('APP_URL') . '/media/banners',
            'path'       => '/media/banners',
            'visibility' => 'public',
            'throw'      => false,
        ],

        'meta_images' => [
            'driver'     => 'local',
            'root'       => storage_path('app/public/media/meta-images'),
            'url'        => env('APP_URL') . '/media/meta-images',
            'path'       => '/media/meta-images',
            'visibility' => 'public',
            'throw'      => false,
        ],

        's3' => [
            'driver'                  => 's3',
            'key'                     => env('AWS_ACCESS_KEY_ID'),
            'secret'                  => env('AWS_SECRET_ACCESS_KEY'),
            'region'                  => env('AWS_DEFAULT_REGION'),
            'bucket'                  => env('AWS_BUCKET'),
            'url'                     => env('AWS_URL'),
            'endpoint'                => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw'                   => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
        public_path('media') => storage_path('app/public/media'),
    ],

];
