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
    public $storageOfPetOut = array();

    /**
     * @param Animal $animal
     * @return bool
     * Добавление в массив объектов, которые не поместились в коробку
     */
    public function addOut(Animal $animal)
    {
        $animal->setInBox(false);
        array_push($this->storageOfPetOut,$animal);

        return false;
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
            if ($animal->isHungry($animal) == true && $animal->getInBox()==0) {
                $countNotHungryOut++;
            } elseif ($animal->isHungry($animal) == false && $animal->getInBox()==0) {
                $countHungryOut++;
            }
        }

        return ['countNotHungryOut'=>$countNotHungryOut, 'countHungryOut'=>$countHungryOut];
    }

    /**
     * @return array
     * Количество голодных животных вне коробки
     */
    public function typeAnimalInOutBox()
    {
        $countDogOut = 0;
        $countCatOut = 0;

        foreach ($this->storageOfPetOut as $animal) {
            if (get_class($animal) == Dog::class && $animal->getInBox() == 0) {
                $countDogOut++;
            } else if (get_class($animal) == Cat::class && $animal->getInBox() == 0) {
                $countCatOut++;
            }
        }

        return ['countDogOut'=>$countDogOut, 'countCatOut'=>$countCatOut];
    }

    public function animalEat()
    {
        foreach ($this->storageOfPetOut as $animal) {
            $animal->animalEat($animal);
        }
    }
}