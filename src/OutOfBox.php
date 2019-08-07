<?php

namespace App;

use App\Abstracts\Animal;

class OutOfBox
{
    /**
     * Массив животных вне коробки
     * @var array
     */
    public $storageOfPetOut  = array();

    /**
     * Массив для хранения экскременов
     * @var array
     */
    protected $wasteOutOfBox = array();

    /**
     * Добавление в массив объектов, которые не поместились в коробку
     * @param Animal $animal
     * @return bool
     */
    public function add(Animal $animal)
    {
        $animal->setInBox(false);
        array_push($this->storageOfPetOut,$animal);

        return true;
    }

    /**
     * Количество кошек вне коробки
     * @return int
     */
    public function catsNotAdd():int
    {
        $notAddedCat = 0;

        foreach ($this->storageOfPetOut as $animal) {
            if(is_a($animal,Cat::class)) {
                $notAddedCat++;
            }
        }
        return $notAddedCat;
    }

    /**
     * Количество собак вне коробки
     * @return int
     */
    public function dogsNotAdd()
    {
        $notAddedDog = 0;

        foreach ($this->storageOfPetOut as $animal) {
            if(is_a($animal,Dog::class)) {
                $notAddedDog++;
            }
        }
        return $notAddedDog;
    }

    /**
     * Количество голодных животных вне коробки
     * @return int
     */
    public function countIsHungry():int
    {
        $countHungry = 0;

        foreach ($this->storageOfPetOut as $animal) {
            if ($animal->isHungry() == true) {
                $countHungry++;
            }
        }
        return $countHungry;
    }

    /**
     * Количество сытых животных вне коробки
     * @return int
     */
    public function countIsNotHungry()
    {
        $countNotHungryOut = 0;

        foreach ($this->storageOfPetOut as $animal) {
            if ($animal->isHungry() == false) {
                $countNotHungryOut++;
            }
        }
        return $countNotHungryOut;
    }

    /**
     * Поход в туалет
     */
    public function animalToilet()
    {
        foreach ($this->storageOfPetOut as $animal) {
            $this->wasteOutOfBox = array_merge($this->wasteOutOfBox, $animal->ifAnimalToilet());
        }
    }
}