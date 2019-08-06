<?php

namespace App;

use App\Abstracts\Animal;
use App\Abstracts\BoxOrNot;
use App\Interfaces\ICounter;

class OutOfBox implements ICounter
{
    /**
     * @var array Массив животных вне коробки
     */
    public $storageOfPetOut  = array();

    /**
     * @var array Массив для хранения экскременов
     */
    protected $wasteOutOfBox = array();
    /**
     * @param Animal $animal
     * @return bool
     * Добавление в массив объектов, которые не поместились в коробку
     */
    public function addOut(Animal $animal)
    {
        $animal->setInBox(false);
        array_push($this->storageOfPetOut,$animal);
        return true;
    }

    /**
     * @return array
     * Количество животных вне коробки
     */
    public function countIsAdd()
    {
        $notAddedCat = 0;
        $notAddedDog = 0;

        foreach ($this->storageOfPetOut as $animal)
        {
            if (is_a($animal, Dog::class)) {
                $notAddedDog++;
            }
            if(is_a($animal,Cat::class)) {
                $notAddedCat++;
            }
        }

        return ['notAddedDog'=>$notAddedDog, 'notAddedCat'=>$notAddedCat];
    }

    /**
     * @return array
     * Количество сытых и голодных животных вне коробки
     */
    public function countIsNotHungry()
    {
        $countNotHungryOut = 0;
        $countHungryOut    = 0;

        foreach ($this->storageOfPetOut as $animal) {
            if ($animal->isHungry() == false) {
                $countNotHungryOut++;
            } elseif ($animal->isHungry() == true) {
                $countHungryOut++;
            }
        }

        return ['countNotHungryOut'=>$countNotHungryOut, 'countHungryOut'=>$countHungryOut];
    }

    public function animalToilet()
    {
        foreach ($this->storageOfPetOut as $animal) {
            $this->wasteOutOfBox = array_merge($this->wasteOutOfBox, $animal->ifAnimalToilet());
        }
    }
}