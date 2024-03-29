<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1c05f890e3b00bcc1a7fca5879545200
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'D' => 
        array (
            'Devsoluzinc\\Projet5CreationBlogPhpV2\\' => 37,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Devsoluzinc\\Projet5CreationBlogPhpV2\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1c05f890e3b00bcc1a7fca5879545200::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1c05f890e3b00bcc1a7fca5879545200::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1c05f890e3b00bcc1a7fca5879545200::$classMap;

        }, null, ClassLoader::class);
    }
}
