<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8393acd86bf5a84f5cc62d548bc83db5
{
    public static $prefixLengthsPsr4 = array (
        'u' => 
        array (
            'utils\\' => 6,
        ),
        's' => 
        array (
            'services\\' => 9,
        ),
        'r' => 
        array (
            'repositories\\' => 13,
        ),
        'm' => 
        array (
            'models\\' => 7,
        ),
        'l' => 
        array (
            'lib\\' => 4,
        ),
        'c' => 
        array (
            'controllers\\' => 12,
        ),
        'Y' => 
        array (
            'Yes\\NuevoProyectoPracticandoTodo\\' => 33,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'utils\\' => 
        array (
            0 => __DIR__ . '/../..' . '/utils',
        ),
        'services\\' => 
        array (
            0 => __DIR__ . '/../..' . '/services',
        ),
        'repositories\\' => 
        array (
            0 => __DIR__ . '/../..' . '/repositories',
        ),
        'models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'lib\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib',
        ),
        'controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
        'Yes\\NuevoProyectoPracticandoTodo\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit8393acd86bf5a84f5cc62d548bc83db5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8393acd86bf5a84f5cc62d548bc83db5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8393acd86bf5a84f5cc62d548bc83db5::$classMap;

        }, null, ClassLoader::class);
    }
}
