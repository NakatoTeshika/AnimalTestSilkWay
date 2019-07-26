<?php

namespace App;

trait Waste
{
    /**
     * @var int
     * Масса экскрементов на текущий момент
     */
    protected $weightOfWaste =0;

    /**
     * @return int
     * Так как свойство имеет область видимости protected, для получения ее значения используется getter
     */
    public function getWeightOfWaste():int
    {
        return $this->weightOfWaste;
    }

    /**
     * @param $weightOfWaste
     * Так как свойство имеет область видимости protected, для изменения ее значения используется setter
     */
    public function setWeightOfWaste($weightOfWaste)
    {
        $this->weightOfWaste = $weightOfWaste;
    }

}