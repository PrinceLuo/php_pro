<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit48fac45edc268d9939997178306aade7
{
    public static $files = array (
        '29ca09075b0f974b6080f7788da20e42' => __DIR__ . '/../..' . '/src/Support/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LaravelStar\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LaravelStar\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit48fac45edc268d9939997178306aade7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit48fac45edc268d9939997178306aade7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
