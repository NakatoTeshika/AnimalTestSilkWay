<?php

namespace App;

trait Waste
{
    protected $weightOfWaste =0;
    private $waste = 10;

    public function getWaste(): int
    {
        return $this->waste;
    }

    public function getWeightOfWaste():int
    {
        return $this->weightOfWaste;
    }

    public function setWeightOfWaste($weightOfWaste)
    {
        $this->weightOfWaste = $weightOfWaste;
//        echo "\n";
    }

}