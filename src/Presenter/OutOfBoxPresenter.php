<?php

namespace App\Presenter;

use App\Abstracts\Presenter;

class OutOfBoxPresenter extends Presenter
{
    /**
     * "Объект" класса OutOfBox
     * @var
     */
    protected $outOfBox;

    public function __construct($outOfBox)
    {
        $this->outOfBox = $outOfBox;
    }

    /**
     * Возвращает количество животных вне коробки
     * @return string
     */
    public function animalCount(): string
    {
        $countAnimals = count($this->outOfBox->storageOfPetOut);
        $animals      = "Количество животных вне коробки " . $countAnimals;

        return $animals;
    }

    /**
     * Возвращает сколько кошек вне коробки - не добавлено
     * @return string
     */
    public function countIsAddCat():string
    {
        $addToBoxCat  = " не добавлено кошек = " . $this->outOfBox->catsNotAdd();

        return $addToBoxCat;
    }

    /**
     * Возвращает сколько собак вне коробки - не добавлено
     * @return string
     */
    public function countIsAddDog():string
    {
        $addToBoxDog  = " не добавлено собак = " . $this->outOfBox->dogsNotAdd();

        return $addToBoxDog;
    }

    /**
     * Возравщает количество кошек вне коробки
     * @return mixed|string
     */
    public function countCat()
    {
        $countCat = "Количество кошек вне коробки " . $this->outOfBox->catsNotAdd();

        return $countCat;
    }

    /**
     * Возвращает количество собак вне коробки
     * @return mixed|string
     */
    public function countDog()
    {
        $countDog = "Количество собак вне коробки " . $this->outOfBox->dogsNotAdd();

        return $countDog;
    }

    /**
     * Возвращает количество животных, которые сыты вне коробки
     * @return mixed|string
     */
    public function countNotHungry()
    {
        $countNotHungry = "Количество сытых вне коробки " . $this->outOfBox->countIsNotHungry();

        return $countNotHungry;
    }

    /**
     * Возвращает количество животных, которые голодны вне коробки
     * @return mixed|string
     */
    public function countHungry()
    {
        $countHungry = "Количество голодных вне коробки " . $this->outOfBox->countIsHungry();

        return $countHungry;
    }
}