<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit94daee94cd6651f8864c59bba6fa9ded
{
    public static $prefixesPsr0 = array (
        'N' => 
        array (
            'Neonexxa\\BillplzWrapper' => 
            array (
                0 => __DIR__ . '/../..' . '/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit94daee94cd6651f8864c59bba6fa9ded::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}