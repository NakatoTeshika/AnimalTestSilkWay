<?php

namespace App\Abstracts;

abstract class ParameterParser
{
    /**
     * @return int
     * Количество щенков, параметр получаемый от пользователя(из консоли или браузерной строки)
     */
    abstract public function getPuppyAmount():int;

    /**
     * @return int
     * Количество котят, параметр получаемый от пользователя(из консоли или браузерной строки)
     */
    abstract public function getKittyAmount():int ;

    /**
     * @return int
     * Объем коробки, параметр получаемый от пользователя(из консоли или браузерной строки)
     */
    abstract public function getBoxVolume():int ;
}