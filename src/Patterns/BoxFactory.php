<?php

namespace App\Patterns;

use App\Abstracts\ParameterParser;
use App\Box;
use App\Interfaces\IFactory;

class BoxFactory implements IFactory
{
    /**
     * @param ParameterParser $counter
     * @return Box|mixed
     * Создание коробки с заданной пользователем площадью коробки
     */
    static public function create(ParameterParser $counter)
    {
        $colourOfBox = ["Зеленая","Красная","Черная","Синяя"];
        $volumeOfBox = $counter->getBoxVolume();
        $box = new Box($colourOfBox[array_rand($colourOfBox,1)], $volumeOfBox);
        return $box;
    }
}