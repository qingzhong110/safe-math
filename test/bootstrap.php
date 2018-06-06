<?php

if (!file_exists(dirname(__DIR__) . DIRECTORY_SEPARATOR . '/vendor/autoload.php')) {
    die("Dependencies must be installed using composer:\n\nphp composer.phar install --dev\n\n"
        . "See http://getcomposer.org for help with installing composer\n");
}

$loader = include realpath(dirname(__FILE__) . '/../vendor/autoload.php');
