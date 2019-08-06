<?php


namespace App;


use App\Abstracts\ParameterParser;

class CliParameterParser extends ParameterParser
{
    protected $puppy_count = 0;
    protected $kitty_count = 0;
    protected $volume_box  = 0;

    /**
     * @return array|mixed
     * Получение значений из консоли в виде массива, используя getopt()
     */
    public function __construct()
    {
        $variable = [
            'puppy_count:',
            'kitty_count:',
            'volume_box:'
//            'volume_feed:'
        ];
        $count = getopt('', $variable);
        if(isset($count['puppy_count'])) {
            $this->puppy_count = $count['puppy_count'];
        }
        if (isset($count['kitty_count'])) {
            $this->kitty_count = $count['kitty_count'];
        }
        if (isset($count['volume_box'])) {
            $this->volume_box  = $count['volume_box'];
        }
    }


    /**
     * @return int
     * Количество щенят, заданных пользователем
     */
    /**
     * @return int
     */
    public function getPuppyCount(): int
    {
        return $this->puppy_count;
    }

    /**
     * @return int
     * Количество котят, заданных пользователем
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
     * Площадь коробки, заданная пользователем
     */
    /**
     * @return int
     */
    public function getBoxVolume(): int
    {
        return $this->volume_box;
    }

}