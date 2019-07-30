<?php

namespace App\Traits;

use App\Abstracts\Animal;

trait Feed
{
    /**
     * @var
     * Текушая масса корма
     */
    protected $weightOfFeed;

    /**
     * @param Animal $animal
     * @return int
     * Масса максимально скормленного корма животным - вызывается в animalEat, используется в random - max
     */
    public function weight(Animal $animal):int
    {
        $this->weightOfFeed = $animal->maxLevelFood-$animal->currentLevelFood;
        return $this->weightOfFeed;
    }
}