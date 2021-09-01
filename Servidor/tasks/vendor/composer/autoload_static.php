<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit41d7c3ff1cef3df17ed24b60c952d864
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SI\\' => 3,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SI\\' => 
        array (
            0 => __DIR__ . '/..' . '/SI',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit41d7c3ff1cef3df17ed24b60c952d864::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit41d7c3ff1cef3df17ed24b60c952d864::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}