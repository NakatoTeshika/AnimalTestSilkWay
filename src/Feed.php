<?php

namespace App\Traits;

use App\Abstracts\Animal;

class Feed
{
    /**
     * @var
     * Текушая масса корма
     */
    protected $weightOfFeed = 0;

    public function __construct($weightOfFeed)
    {
        $this->weightOfFeed = $weightOfFeed;
    }

    /**
     * @return mixed
     */
    public function getWeightOfFeed()
    {
        return $this->weightOfFeed;
    }
}