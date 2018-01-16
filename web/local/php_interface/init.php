<?php

// автозагрузчик для всех классов проекта с соблюдением стандарта PSR-4
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);

    $path = $_SERVER["DOCUMENT_ROOT"] .'/local/php_interface/lib/'.$class.'.php';

    if (is_readable($path)) {
        require_once $path;
    }
});

require_once __DIR__.'/include/define.php';     # Константы
require_once __DIR__.'/include/class.php';      # Общие классы
require_once __DIR__.'/include/functions.php';  # Общие функции
require_once __DIR__.'/include/events.php';     # События
require_once __DIR__.'/include/agents.php';     # Агенты