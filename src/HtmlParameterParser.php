<?php

namespace App;

use App\Abstracts\ParameterParser;

class HtmlParameterParser extends ParameterParser
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
    protected $volume_box   = 0;

    /**
     * Массив наименований входных параметров
     * @var array
     */
    protected $parameters = ['puppy_count', 'kitty_count', 'volume_box'];

    /**
     * Присваиваем определенные параметры, используя функцию returnParameter()
     * HtmlParameterParser constructor.
     */
    public function __construct()
    {
        foreach ($this->parameters as $parameter) {
            $this->$parameter = $this->returnParameter($parameter);
        }
    }

    /**
     * Возвращает значения параметров введеных пользователем, либо возвращает значение по умолчанию
     * @param $parameter
     * @return int
     */
     public function returnParameter($parameter):int
     {
         if (property_exists(self::class, $parameter) && isset($_GET[$parameter])) {
             return $_GET[$parameter];
         } else
             return Config::get($parameter);
     }

    /**
     * Количество щенят, значение введенное в браузерной строке
     * @return int
     */
    public function getPuppyCount():int
    {
        return $this->puppy_count;
    }

    /**
     * Количество котят, значение введенное в браузерной строке
     * @return int
     */
    public function getKittyCount(): int
    {
        return $this->kitty_count;
    }

    /**
     * Площадь коробки, значение введенное в браузерной строке
     * @return int
     */
    public function getBoxVolume(): int
    {
        return $this->volume_box;
    }
}