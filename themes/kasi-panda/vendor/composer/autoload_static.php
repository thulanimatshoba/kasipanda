<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd749e4804e356293a087cd454763c48b
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd749e4804e356293a087cd454763c48b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd749e4804e356293a087cd454763c48b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
