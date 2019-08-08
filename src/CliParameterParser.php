<?php

namespace App;

use App\Abstracts\ParameterParser;

class CliParameterParser extends ParameterParser
{
    /**
     * Количество щенят
     * @var int
     */
    protected $puppy_count;

    /**
     * Количество котят
     * @var int
     */
    protected $kitty_count;

    /**
     * Площадь коробки
     * @var int
     */
    protected $volume_box;

    /**
     * Массив наименований входных параметров
     * @var array
     */
    protected $variable = [
        'puppy_count:',
        'kitty_count:',
        'volume_box:'
    ];

    /**
     * Значения параметров
     * @var array
     */
    protected $count ;

    /**
     * Используя функцию returnParameter() возвращаем значения параметров для собак, кошек и коробки. Полученные значения
     * присваиваем переменным.
     */
    public function __construct()
    {
        $this->count = getopt('', $this->variable);

        foreach ($this->variable as $parameter) {
            $parameter = mb_substr($parameter, 0, -1);
            $this->$parameter = $this->returnParameter($parameter);
        }
    }

    /**
     * Возвращает параметры вводимые пользователем - количество щенят, котят и площадь коробки
     * либо устанавливает значения по умолчанию
     * @param $parameter
     * @return int
     */
    public function returnParameter($parameter):int
    {
        if (property_exists(self::class, $parameter) && isset($this->count[$parameter])) {
            return $this->count[$parameter];
        } else
            return Config::get($parameter);
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
    public function getBoxVolume():int
    {
        return $this->volume_box;
    }
}