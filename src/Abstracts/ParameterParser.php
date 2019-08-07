<?php

namespace App\Abstracts;

abstract class ParameterParser
{
    /**
     * Количество щенков, параметр получаемый от пользователя(из консоли или браузерной строки)
     * @return int
     */
    abstract public function getPuppyCount():int;

    /**
     * Количество котят, параметр получаемый от пользователя(из консоли или браузерной строки)
     * @return int
     */
    abstract public function getKittyCount():int ;

    /**
     * Объем коробки, параметр получаемый от пользователя(из консоли или браузерной строки)
     * @return int
     */
    abstract public function getBoxVolume():int ;
}