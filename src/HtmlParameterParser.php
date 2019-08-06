<?php

namespace App;

use App\Abstracts\ParameterParser;

class HtmlParameterParser extends ParameterParser
{
    protected $puppy_count = 0;

    protected $kitty_count = 0;

    protected $volumeBox = 0;

    public function __construct()
    {
        if (isset($_GET['puppy_count'])) {
            $this->puppy_count = $_GET['puppy_count'];
        }
        if (isset($_GET['kitty_count'])) {
            $this->puppy_count = $_GET['kitty_count'];
        }
        if (isset($_GET['volume_box'])) {
            $this->puppy_count = $_GET['volume_box'];
        }
    }

    /**
     * @return int
     * Количество щенят, значение введенное в браузерной строке
     */
    /**
     * @return int|mixed
     */
    public function getPuppyCount():int
    {
        return $this->puppy_count;
    }

    /**
     * @return int
     * Количество котят, значение введенное в браузерной строке
     */
    /**
     * @return int
     */
    public function getKittyCount(): int
    {
        return $this->kitty_count;
    }

    /**
     * @return int
     * Площадь коробки, значение введенное в браузерной строке
     */
    /**
     * @return int
     */
    public function getBoxVolume(): int
    {
        return $this->volumeBox;
    }
}