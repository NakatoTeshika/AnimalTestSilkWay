<?php

namespace App\Factory;

use App\Box;
use App\Interfaces\IFactory;

class BoxFactory implements IFactory
{
    /**
     * Создание коробки с заданной пользователем площадью коробки
     * @param $parameter
     * @return Box|mixed
     */
    static public function create($parameter)
    {
        $volumeOfBox = $parameter;
        $box         = new Box($volumeOfBox);

        return $box;
    }
}