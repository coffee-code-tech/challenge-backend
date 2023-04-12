<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteb6df8e0a9807776f81942cea5653da8
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Automattic\\WooCommerce\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Automattic\\WooCommerce\\' => 
        array (
            0 => __DIR__ . '/..' . '/automattic/woocommerce/src/WooCommerce',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteb6df8e0a9807776f81942cea5653da8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteb6df8e0a9807776f81942cea5653da8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticIniteb6df8e0a9807776f81942cea5653da8::$classMap;

        }, null, ClassLoader::class);
    }
}
