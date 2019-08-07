<?php

namespace App\Presenter;

use App\Abstracts\Presenter;
use App\Waste;

class BoxPresenter extends Presenter
{
    /**
     * "Объект" класса Box
     * @var
     */
    protected $box;

    /**
     * "Объект" класса ParameterParser
     * @var
     */
    protected $parameter;

    public function __construct($box,$parameter)
    {
        $this->box       = $box;
        $this->parameter = $parameter;
    }

    /**
     * Возвращает количество животных в коробке
     * @return string
     */
    public function animalCount(): string
    {
        $countAnimals = count($this->box->storageOfPet);
        $animals      = "Количество животных в коробке " . $countAnimals;

        return $animals;
    }

    /**
     * Возвращает сколько кошек было добавлено в коробку
     * @return string
     */
    public function countIsAddCat():string
    {
        $addToBoxCat = "Было добавлено кошек = " . $this->box->catsAddedCount();

        return $addToBoxCat;
    }

    /**
     * Возвращает сколько собак было добавлено в коробку
     * @return string
     */
    public function countIsAddDog():string
    {
        $addToBoxDog = "Было добавлено собак = " . $this->box->dogsAddedCount();

        return $addToBoxDog;
    }

    /**
     * Возравщает количество кошек в коробке
     * @return mixed|string
     */
    public function countCat()
    {
        $countCat = "Количество кошек в коробке " . $this->box->catsAddedCount();

        return $countCat;
    }

    /**
     * Возвращает количество собак в коробке
     * @return mixed|string
     */
    public function countDog()
    {
        $countDog = "Количество собак в коробке " . $this->box->dogsAddedCount();

        return $countDog;
    }

    /**
     * Возвращает количество животных, которые сыты
     * @return mixed|string
     */
    public function countNotHungry()
    {
        $countNotHungry = "Количество сытых в коробке " . $this->box->countIsNotHungry();

        return $countNotHungry;
    }

    /**
     * Возвращает количество животных, которые голодны
     * @return mixed|string
     */
    public function countHungry()
    {
        $countHungry = "Количество голодных в коробке " . $this->box->countIsHungry();

        return $countHungry;
    }

    /**
     * Возвращает сколько еще котиков может поместиться в коробку
     * @return string
     */
    public function spaceForCat()
    {
        $space = (int)$this->box->placeForCat() . " столько котиков может поместиться в коробку";

        return $space;
    }

    /**
     * Возвращает сколько еще щеночков может поместиться в коробку
     * @return string
     */
    public function spaceForDog()
    {
        $space = (int)$this->box->placeForDog() . " столько щенят может поместиться в коробку";

        return $space;
    }

    /**
     * Возвращает результат выполнения animalToilet()
     * @return mixed
     */
    public function messageClear()
    {
        if ($this->box->animalWaste()) {
            return "Пора убираться!";
        } else {
            return "Не надо убираться! Уже убрано!";
        }
    }
}