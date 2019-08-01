<?php


namespace App;


use App\Abstracts\ParameterParser;

class CliParameterParser extends ParameterParser
{
    /**
     * @return array|mixed
     * Получение значений из консоли в виде массива, используя getopt()
     */
    public function animalCounter()
    {
        $variable = [
          'puppy_count:',
          'kitty_count:',
          'volume_box:'
        ];
        $count    = getopt('', $variable);

        return $count;
    }

    /**
     * @return int
     * Количество щенят, заданных пользователем
     */
    public function getPuppyAmount():int
    {
        $limitAnimal = $this->animalCounter();
        $limitPuppy  = $limitAnimal['puppy_count'];

        return (int)$limitPuppy;
    }

    /**
     * @return int
     * Количество котят, заданных пользователем
     */
    public function getKittyAmount():int
    {
        $limitAnimal = $this->animalCounter();
        $limitKitty  = $limitAnimal['kitty_count'];

        return (int)$limitKitty;
    }

    /**
     * @return int
     * Площадь коробки, заданная пользователем
     */
    public function getBoxVolume():int
    {
        $limitBox= $this->animalCounter();
        $volumeBox = $limitBox['volume_box'];

        return (int)$volumeBox;
    }

}