<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb458dddd23d53bd22eaebedd1ef62e67
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb458dddd23d53bd22eaebedd1ef62e67::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb458dddd23d53bd22eaebedd1ef62e67::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb458dddd23d53bd22eaebedd1ef62e67::$classMap;

        }, null, ClassLoader::class);
    }
}
