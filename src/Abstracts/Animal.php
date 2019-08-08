<?php

namespace App\Abstracts;

use App\Feed;
use App\Interfaces\IAnimal;
use App\Waste;

abstract class Animal implements IAnimal
{
    /**
     * Желудок животного
     * @var array
     */
    protected $stomachAnimal = array();

    /**
     * Имя животного
     */
    protected $name;

    /**
     * Порода зверюшки
     * @var
     */
    protected $species;

    /**
     * Пол зверюшки
     * @var
     */
    protected $gender;

    /**
     * Цвет животного
     * @var
     */
    protected $animalColour;

    /**
     * Максимальное количество еды, которое может принять животное(лимит сытости)
     * @var
     */
    protected $maxLevelFood;

    /**
     * Возраст животного
     * @var
     */
    protected $age;

    /**
     * Площадь занимаемая животным
     * @var
     */
    protected $volumeAnimal;

    /**
     *Так как свойство имеет область видимости protected, для получения ее значения используется getter
     */
    public function getVolumeAnimal()
    {
        return $this->volumeAnimal;
    }

    /**
     * Конструктор зверюшки
     * Animal constructor.
     * @param $name
     * @param $species
     * @param $gender
     * @param $animalColour
     * @param $maxLevelFood
     * @param $age
     * @param $volumeAnimal
     */
    public function __construct($name, $species, $gender, $animalColour, $maxLevelFood, $age, $volumeAnimal)
    {
        $this->name             = $name;
        $this->species          = $species;
        $this->gender           = $gender;
        $this->animalColour     = $animalColour;
        $this->maxLevelFood     = $maxLevelFood;
        $this->age              = $age;
        $this->volumeAnimal     = $volumeAnimal;
    }

    /**
     * Функция ползает ли животное, возвращает true, так как и те и другие ползают
     * @return bool
     */
    public function animalCreep(): bool
    {
        return true;
    }

    /**
     * Функция какой звук издает животное. Реализуется в классах Cat и Dog
     */
    abstract public function animalVoice(): string ;

    /**
     * Функция кормления животных, сравнивает значения текущего уровня сытости и максимального,
     * и св-во в коробке ли животное
     * ->
     * к текущему уровню сытости прибавляем рандомное число
     * @param Feed $feed
     * @return bool
     */
    public function animalEat(Feed $feed):bool
    {
        array_push($this->stomachAnimal, $feed);
        $this->isHungry();

        return true;
    }

    /**
     * Проверка голодное ли животное
     * @return bool
     */
    public function isHungry()
    {
        if (count($this->stomachAnimal)!=0) {
            return false;
        } else
            return true;
    }

    /**
     * Функция проверяющая какое животное готово сходить в туалет и если готово добавляет в массив - экскременты
     * @return array
     */
    public function ifAnimalToilet():array
    {
        $wasteArray = array();

        if (!$this->isHungry()) {
            array_push($wasteArray, new Waste(array_pop($this->stomachAnimal)));
        }
        return $wasteArray;
    }
}