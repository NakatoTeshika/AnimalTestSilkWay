<?php

namespace App;

class Config
{
    /**
     * Переменная, которая будет принимать массив значений из configuration
     * @var
     */
    private static $config;

    /**
     *Возвращает значения из configuration.php
     * @return mixed
     */
    public static function getConfig()
    {
        if(self::$config === null) {
            return self::$config = require_once(ROOT . 'configuration.php');
        }
        else
            return self::$config;
    }

    /**
     * Возвращает значение по умолчанию с помощью ключа
     * @param $key
     * @return mixed|null
     */
    public static function get($key)
    {
        $value = isset(self::getConfig()[$key]) ? self::getConfig()[$key] : null;

        return $value;
    }
}