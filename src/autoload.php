<?php
// Autoloader for the application
spl_autoload_register(function ($class) {

    $file = BASE_PATH . '/' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});