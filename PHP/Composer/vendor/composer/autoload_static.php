<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdbda54166799b1a034e02ccb02d17ca0
{
    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Monolog' => 
            array (
                0 => __DIR__ . '/..' . '/monolog/monolog/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitdbda54166799b1a034e02ccb02d17ca0::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitdbda54166799b1a034e02ccb02d17ca0::$classMap;

        }, null, ClassLoader::class);
    }
}