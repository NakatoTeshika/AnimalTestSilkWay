<?php

namespace App\Traits;

class Waste
{
    /**
     * @var int
     * Масса экскрементов на текущий момент
     */
    protected $weightOfWaste;

    public function __construct($weightOfWaste)
    {
        $this->weightOfWaste = $weightOfWaste;
    }

    /**
     * @return int
     */
    public function getWeightOfWaste()
    {
        return $this->weightOfWaste;
    }
}