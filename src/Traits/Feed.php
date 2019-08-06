<?php

namespace App\Traits;

use App\Abstracts\Animal;
use App\Abstracts\Максимальное;
use App\Abstracts\Текущий;

class Feed
{
    /**
     * @var
     * Текушая масса корма
     */
    protected $weightOfFeed;

    public function __construct($weightOfFeed)
    {
        $this->weightOfFeed = $weightOfFeed;
    }



    /**
     * @param Animal $animal
     * @return Максимальное|Текущий|int
     * Масса максимально скормленного корма животным - вызывается в animalEat, используется в random - max
     */
    public function weight(Animal $animal)
    {
        $this->weightOfFeed = $animal->getMaxLevelFood()-$animal->getCurrentLevelFood();
        return $this->weightOfFeed;
    }
}