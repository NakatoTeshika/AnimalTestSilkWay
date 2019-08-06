<?php

namespace App\Abstracts;

use App\Traits\Feed;
use App\Interfaces\IAnimal;
use App\Traits\Waste;

abstract class Animal implements IAnimal
{
    /**
     * @var array
     * Желудок животного
     */
    protected $stomachAnimal = array();

    /**
     * Имя животного
     */
    protected $name;

    /**
     * @var
     * Порода зверюшки
     */
    protected $species;

    /**
     * @var
     * Пол зверюшки
     */
    protected $gender;
    /**
     * @var
     * Цвет животного
     */
    protected $animalColour;
    /**
     * @var
     * Максимальное количество еды, которое может принять животное(лимит сытости)
     */
    protected $maxLevelFood;

    /**
     * @var
     * Возраст животного
     */
    protected $age;

    /**
     * @var
     * Площадь занимаемая животным
     */
    protected $volumeAnimal;

    /**
     * @var int Флаг, который указывает в коробке ли животное
     */
    protected $inBox = false;

    /**
     *Так как свойство имеет область видимости protected, для получения ее значения используется getter
     */
    public function getVolumeAnimal()
    {
        return $this->volumeAnimal;
    }

    public function __construct($name, $species, $gender, $animalColour, $maxLevelFood, $age, $volumeAnimal, $stomachAnimal)
    {
        $this->name             = $name;
        $this->species          = $species;
        $this->gender           = $gender;
        $this->animalColour     = $animalColour;
        $this->maxLevelFood     = $maxLevelFood;
        $this->age              = $age;
        $this->volumeAnimal     = $volumeAnimal;
        $this->stomachAnimal    = $stomachAnimal;
    }

    /**
     * @return bool
     * Функция ползает ли животное, возвращает true, так как и те и другие ползают
     */
    public function animalCreep(): bool
    {
        return true;
    }

    /**
     * Функция какой звук издает животное. Реализуется в классах Cat и Dog
     */
    abstract public function animalVoice(): void;

    /**
     * @param $inBox
     * Так как свойство имеет область видимости protected, для изменения ее значения используется setter
     *
     */
    public function setInBox($inBox)
    {
        $this->inBox = $inBox;
    }

    /**
     * @param Feed $feed
     * @return bool
     * Функция кормления животных, сравнивает значения текущего уровня сытости и максимального,
     * и св-во в коробке ли животное
     * ->
     * к текущему уровню сытости прибавляем рандомное число
     */
    public function animalEat(Feed $feed):bool
    {
        array_push($this->stomachAnimal, $feed);
        $this->isHungry();
        return true;
    }

    /**
     *
     * Проверка голодное ли животное
     * @return bool
     *
     */
    public function isHungry()
    {
        if(count($this->stomachAnimal)!=0)
        {
            return false;
        }
        else return true;
    }

    /**
     * Функция проверяющая какое животное готово сходить
     * в туалет(необходимо, чтобы текущее значение еды
     * было равно, либо превышало значение maxLevel(максимальное количество еды))
     */
    public function ifAnimalToilet()
    {
        $wasteArray = array();
        if(!$this->isHungry()) {
            array_push($wasteArray, new Waste(array_pop($this->stomachAnimal)));
        }
        return $wasteArray;
    }
}