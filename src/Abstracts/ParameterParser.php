<?php

namespace App\Abstracts;

abstract class ParameterParser
{
    /**
     * @return int
     * Количество щенков, параметр получаемый от пользователя(из консоли или браузерной строки)
     */
    abstract public function getPuppyCount():int;

    /**
     * @return int
     * Количество котят, параметр получаемый от пользователя(из консоли или браузерной строки)
     */
    abstract public function getKittyCount():int ;

    /**
     * @return int
     * Объем коробки, параметр получаемый от пользователя(из консоли или браузерной строки)
     */
    abstract public function getBoxVolume():int ;
}