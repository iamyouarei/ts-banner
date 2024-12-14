<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd287a6e2b3118f69c3ffc9c685c40d4f
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\SimpleCache\\' => 16,
            'Psr\\Cache\\' => 10,
            'Phpfastcache\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\SimpleCache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/simple-cache/src',
        ),
        'Psr\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/cache/src',
        ),
        'Phpfastcache\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib/Phpfastcache',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd287a6e2b3118f69c3ffc9c685c40d4f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd287a6e2b3118f69c3ffc9c685c40d4f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
