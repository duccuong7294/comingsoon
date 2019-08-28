<?php
// autoload_static.php @generated by Composer
namespace Composer\Autoload;

/**
 * Class ComposerStaticInite80cf216dc3adaace4fd3d7f63793b8a
 * @package Composer\Autoload
 */
class ComposerStaticInite80cf216dc3adaace4fd3d7f63793b8a
{
    public static $prefixLengthsPsr4
        = array(
            'C' =>
                array(
                    'Comingsoon\\' => 11,
                ),
        );
    public static $prefixDirsPsr4
        = array(
            'Comingsoon\\' =>
                array(
                    0 => __DIR__ . '/../..' . '/app',
                ),
        );
    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(
            function () use ($loader) {
                $loader->prefixLengthsPsr4
                    = ComposerStaticInite80cf216dc3adaace4fd3d7f63793b8a::$prefixLengthsPsr4;
                $loader->prefixDirsPsr4
                    = ComposerStaticInite80cf216dc3adaace4fd3d7f63793b8a::$prefixDirsPsr4;
            },
            null,
            ClassLoader::class
        );
    }
}
