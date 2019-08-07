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
    protected $volumeBox   = 0;

    /**
     * Присваиваем определенные параметры, используя функцию returnParameter()
     * HtmlParameterParser constructor.
     */
    public function __construct()
    {
        $this->puppy_count = $this->returnParameter('puppy_count');
        $this->kitty_count = $this->returnParameter('kitty_count');
        $this->volumeBox   = $this->returnParameter('volume_box');
    }

    /**
     * Возвращает значения параметров
     * @param $parameter
     * @return int
     */
    public function returnParameter($parameter):int
    {
        if (isset($_GET[$parameter])) {
             $_GET[$parameter];
        }
        return $_GET[$parameter];
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
        return $this->volumeBox;
    }
}