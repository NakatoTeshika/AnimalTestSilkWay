<?php


namespace App\Patterns;

use App\Abstracts\BoxOrNot;
use App\Abstracts\Presenter;
use App\Interfaces\IPresenter;
use App\Traits\Waste;

class BoxPresenter extends Presenter
{
    /**
     * @var
     * "Объект" класса Box
     */
    protected $box;

    /**
     * @var
     * "Объект" класса ParameterParser
     */
    protected $parameter;

    public function __construct($box,$parameter)
    {
        $this->box = $box;
        $this->parameter = $parameter;
    }

    /**
     * @return string
     * Возвращает количество животных в коробке
     */
    public function animalCount(): string
    {
        $countAnimals = count($this->box->storageOfPet);
        $animals = "Количество животных в коробке " . $countAnimals;
        return $animals;
    }

    /**
     * @return string
     * Возвращает сколько кошек было добавлено в коробку
     */
    public function countIsAddCat():string
    {
        $countAnimals = $this->box->countIsAdd();
        $addToBoxCat = "Было добавлено кошек = " .$countAnimals['addedCat'];
        return $addToBoxCat;
    }

    /**
     * @return string
     * Возвращает сколько собак было добавлено в коробку
     */
    public function countIsAddDog():string
    {
        $countAnimals = $this->box->countIsAdd();
        $addToBoxDog = "Было добавлено собак = " .$countAnimals['addedDog'];
        return $addToBoxDog;
    }

    /**
     * @return mixed|string
     * Возравщает количество кошек в коробке
     */
    public function countCat()
    {
        $typeAnimalCount= $this->box->countIsAdd();
       $countCat =  "Количество кошек в коробке "      . $typeAnimalCount['addedCat'];
       return $countCat;
    }

    /**
     * @return mixed|string
     * Возвращает количество собак в коробке
     */
    public function countDog()
    {
        $typeAnimalCount= $this->box->countIsAdd();
        $countDog =  "Количество собак в коробке "      . $typeAnimalCount['addedDog'];
        return $countDog;
    }

    /**
     * @return mixed|string
     * Возвращает количество животных, которые сыты
     */
    public function countNotHungry()
    {
        $countHungryOrNot = $this->box->countIsNotHungry();
        $countNotHungry = "Количество сытых в коробке "      . $countHungryOrNot['countNotHungryIn'];
        return $countNotHungry;
    }

    /**
     * @return mixed|string
     * Возвращает количество животных, которые голодны
     */
    public function countHungry()
    {
        $countHungryOrNot = $this->box->countIsNotHungry();
        $countHungry = "Количество голодный в коробке " . $countHungryOrNot['countHungryIn'];
        return $countHungry;
    }

    /**
     * @return string
     * Возвращает сколько еще котиков может поместиться в коробку
     */
    public function spaceForCat()
    {
        $enoughPlace = $this->box->enoughPlace();
        $space = (int)$enoughPlace['newSpaceCat'] . " столько котиков может поместиться в коробку";
        return $space;
    }

    /**
     * @return string
     * Возвращает сколько еще щеночков может поместиться в коробку
     */
    public function spaceForDog()
    {
        $enoughPlace = $this->box->enoughPlace();
        $space = (int)$enoughPlace['newSpaceDog'] . " столько щенят может поместиться в коробку";
        return $space;
    }

    /**
     * @return mixed
     * Возвращает результат выполнения animalToilet()
     */
    public function messageClear()
    {
        if ($this->box->animalWaste()) {
            return "Пора убираться!";
        } else {
                return "Не надо убираться!";
        }
    }
}
