<?php

namespace App;

use App\Abstracts\ParameterParser;

class CliParameterParser extends ParameterParser
{
    /**
     * Количество щенят
     * @var int
     */
    protected $puppy_count = 0;

    /**
     * Количество котят
     * @var int
     */
    protected $kitty_count = 0;

    /**
     * Площадь коробки
     * @var int
     */
    protected $volume_box  = 0;

    /**
     * Используя функцию returnParameter() возвращаем значения параметров для собак, кошек и коробки. Полученные значения
     * присваиваем переменным.
     */
    public function __construct()
    {
        $this->puppy_count = $this->returnParameter('puppy_count');
        $this->kitty_count = $this->returnParameter('kitty_count');
        $this->volume_box  = $this->returnParameter('volume_box');
    }

    /**
     * Возвращает параметры вводимые пользователем - количество щенят, котят и площадь коробки
     * @param $parameter
     * @return int
     */
    public function returnParameter($parameter):int
    {
        $variable = [
            'puppy_count:',
            'kitty_count:',
            'volume_box:'
        ];
        $count    = getopt('', $variable);

        if (isset($count[$parameter])) {
            $count[$parameter];
        }
        return $count[$parameter];
    }

    /**
     * Количество щенят, заданных пользователем
     * @return int
     */
    public function getPuppyCount(): int
    {
        return $this->puppy_count;
    }

    /**
     * Количество котят, заданных пользователем
     * @return int
     */
    public function getKittyCount(): int
    {
        return $this->kitty_count;
    }

    /**
     * Площадь коробки, заданная пользователем
     * @return int
     */
    public function getBoxVolume(): int
    {
        return $this->volume_box;
    }
}