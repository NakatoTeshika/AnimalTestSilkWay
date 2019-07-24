<?php

namespace App;

use App\Abstracts\Animal;

trait Feed
{
    protected $weightOfFeed;

    public function __get($weightOfFeed)
    {
        // TODO: Implement __get() method.
        return $this->weightOfFeed;
    }

    public function __set($weightOfFeed, $value)
    {
        // TODO: Implement __set() method.
        $this->weightOfFeed = $value;
    }

    public function weight(Animal $animal):int
    {
        $this->weightOfFeed = $animal->maxLevelFood-$animal->currentLevelFood;
        return $this->weightOfFeed;
    }
}