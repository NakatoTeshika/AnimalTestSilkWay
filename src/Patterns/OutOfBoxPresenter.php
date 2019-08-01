<?php


namespace App\Patterns;

use App\Abstracts\Presenter;
use App\Interfaces\IPresenter;

class OutOfBoxPresenter extends Presenter
{
    /**
     * @var
     * "Объект" класса OutOfBox
     */
    protected $outOfBox;
    public function __construct($outOfBox)
    {
        $this->outOfBox = $outOfBox;
    }

    /**
     * @return string
     * Возвращает количество животных вне коробки
     */
    public function animalCount(): string
    {
        $countAnimals = count($this->outOfBox->storageOfPetOut);
        $animals = "Количество животных вне коробки " . $countAnimals;
        return $animals;
    }

    /**
     * @return string
     * Возвращает сколько кошек вне коробки - не добавлено
     */
    public function countIsAddCat():string
    {
        $countAnimals = $this->outOfBox->countIsAdd();
        $addToBoxCat = "не добавлено кошек = " .$countAnimals['notAddedCat'];
        return $addToBoxCat;
    }

    /**
     * @return string
     * Возвращает сколько собак вне коробки - не добавлено
     */
    public function countIsAddDog():string
    {
        $countAnimals = $this->outOfBox->countIsAdd();
        $addToBoxDog = "не добавлено собак = " .$countAnimals['notAddedDog'];
        return $addToBoxDog;
    }

    /**
     * @return mixed|string
     * Возравщает количество кошек вне коробки
     */
    public function countCat()
    {
        $typeAnimalCount= $this->outOfBox->typeAnimalInOutBox();
        $countCat =  "Количество кошек вне коробки "      . $typeAnimalCount['countCatOut'];
        return $countCat;
    }

    /**
     * @return mixed|string
     * Возвращает количество собак вне коробки
     */
    public function countDog()
    {
        $typeAnimalCount= $this->outOfBox->typeAnimalInOutBox();
        $countDog =  "Количество собак вне коробки "      . $typeAnimalCount['countDogOut'];
        return $countDog;
    }

    /**
     * @return mixed|string
     * Возвращает количество животных, которые сыты вне коробки
     */
    public function countNotHungry()
    {
        $countHungryOrNot = $this->outOfBox->countIsNotHungry();
        $countNotHungry = "Количество сытых вне коробки "      . $countHungryOrNot['countNotHungryOut'];
        return $countNotHungry;
    }

    /**
     * @return mixed|string
     * Возвращает количество животных, которые голодны вне коробки
     */
    public function countHungry()
    {
        $countHungryOrNot =$this->outOfBox->countIsNotHungry();
        $countHungry = "Количество голодных вне коробки " . $countHungryOrNot['countHungryOut'];
        return $countHungry;
    }
}