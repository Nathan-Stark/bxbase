<?php
return array (
  'utf_mode' => 
  array (
    'value' => true,
    'readonly' => true,
  ),
  'cache_flags' => 
  array (
    'value' => 
    array (
      'config_options' => 3600.0,
      'site_domain' => 3600.0,
    ),
    'readonly' => false,
  ),
  'cookies' => 
  array (
    'value' => 
    array (
      'secure' => false,
      'http_only' => true,
    ),
    'readonly' => false,
  ),
  'exception_handling' => 
  array (
    'value' => 
    array (
      'value' => 
      array (
        'debug' => true,
        'handled_errors_types' => 4437,
        'exception_errors_types' => 4437,
        'ignore_silence' => false,
        'assertion_throws_exception' => true,
        'assertion_error_type' => 256,
        'log' => NULL,
      ),
    ),
    'readonly' => false,
  ),
  'connections' => 
  array (
    'value' => 
    array (
      'default' => 
      array (
        'host' => 'localhost',
        'database' => 'sitemanager',
        'login' => 'bitrix',
        'password' => 'bitrix',
        'className' => '\\Bitrix\\Main\\DB\\MysqliConnection',
        'options' => 2,
      ),
    ),
    'readonly' => false,
  ),
);
