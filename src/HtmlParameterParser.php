<?php

namespace App;

use App\Abstracts\ParameterParser;

class HtmlParameterParser extends ParameterParser
{
    /**
     * @return int
     * Количество щенят, значение введенное в браузерной строке
     */
    public function getPuppyAmount(): int
    {
        $puppy_count = $_GET['puppy_count'];

        return (int)$puppy_count;
    }

    /**
     * @return int
     * Количество котят, значение введенное в браузерной строке
     */
    public function getKittyAmount(): int
    {
        $kitty_count = $_GET['kitty_count'];

        return  (int)$kitty_count;
    }

    /**
     * @return int
     * Площадь коробки, значение введенное в браузерной строке
     */
    public function getBoxVolume(): int
    {
        $volumeBox = $_GET['volume_box'];

        return (int)$volumeBox;
    }
}