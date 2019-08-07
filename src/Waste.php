<?php

namespace App;

class Waste
{
    /**
     * Масса экскрементов на текущий момент
     * @var int
     */
    protected $weightOfWaste;

    public function __construct($weightOfWaste)
    {
        $this->weightOfWaste = $weightOfWaste;
    }

    /**
     * Так как область видимости protected, для того чтобы получить значение
     * используем getter и возвращаем значение weightOfWaste
     * @return int
     */
    public function getWeightOfWaste()
    {
        return $this->weightOfWaste;
    }
}