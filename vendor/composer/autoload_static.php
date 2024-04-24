<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitec0df506be35e0b12bcc0d0994857688
{
    public static $prefixLengthsPsr4 = array (
        'e' => 
        array (
            'eftec\\bladeone\\' => 15,
        ),
        'T' => 
        array (
            'Thanhdo\\Mvcoop\\' => 15,
        ),
        'R' => 
        array (
            'Rakit\\Validation\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'eftec\\bladeone\\' => 
        array (
            0 => __DIR__ . '/..' . '/eftec/bladeone/lib',
        ),
        'Thanhdo\\Mvcoop\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Rakit\\Validation\\' => 
        array (
            0 => __DIR__ . '/..' . '/rakit/validation/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'Bramus' => 
            array (
                0 => __DIR__ . '/..' . '/bramus/router/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitec0df506be35e0b12bcc0d0994857688::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitec0df506be35e0b12bcc0d0994857688::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitec0df506be35e0b12bcc0d0994857688::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitec0df506be35e0b12bcc0d0994857688::$classMap;

        }, null, ClassLoader::class);
    }
}
