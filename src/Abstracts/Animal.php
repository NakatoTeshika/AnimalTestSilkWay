<?php

namespace App\Abstracts;

use App\Traits\Feed;
use App\Interfaces\IAnimal;
use App\Traits\Waste;

abstract class Animal implements IAnimal
{
    /**
     * Трейт корма
     */
    use Feed;
    /**
     * Трейт экскрементов
     */
    use Waste;
    protected $name;
    /**
     * @var Порода зверюшки
     */
    protected $species;
    /**
     * @var Пол зверюшки
     */
    protected $gender;
    protected $animalColour;
    /**
     * @var Максимальное количество еды, которое может принять животное(лимит сытости)
     */
    protected $maxLevelFood;
    /**
     * @var Текущий уровень сытости
     */
    protected $currentLevelFood;
    protected $age;
    /**
     * @var Площадь занимаемая животным
     */
    protected $volumeAnimal;
    /**
     * @var int Флаг, который указывает в коробке ли животное
     */
    protected $inBox = false;

    /**
     *Так как свойство имеет область видимости protected, для получения ее значения используется getter
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * Так как свойство имеет область видимости protected, для получения ее значения используется getter
     * @return bool
     */
    public function getInBox(): bool
    {
        return $this->inBox;
    }

    /**
     * @param $volumeAnimal
     * Так как свойство имеет область видимости protected, для изменения ее значения используется setter
     */
    public function setVolumeAnimal($volumeAnimal)
    {
        $this->volumeAnimal = $volumeAnimal;
    }

    /**
     *Так как свойство имеет область видимости protected, для получения ее значения используется getter
     */
    public function getVolumeAnimal()
    {
        return $this->volumeAnimal;
    }

    public function __construct($name, $species, $gender, $animalColour, $maxLevelFood, $currentLevelFood, $age, $volumeAnimal)
    {
        $this->name             = $name;
        $this->species          = $species;
        $this->gender           = $gender;
        $this->animalColour     = $animalColour;
        $this->maxLevelFood     = $maxLevelFood;
        $this->currentLevelFood = $currentLevelFood;
        $this->age              = $age;
        $this->volumeAnimal     = $volumeAnimal;
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
     * @param Animal $animal
     * @return bool
     * Функция кормления животных, сравнивает значения текущего уровня сытости и максимального,
     * и св-во в коробке ли животное
     * ->
     * к текущему уровню сытости прибавляем рандомное число
     */
    public function animalEat(Animal $animal):bool
    {
        if ($animal->currentLevelFood < $animal->maxLevelFood && $animal->inBox == 1) {
              $animal->currentLevelFood += rand(0,$animal->weight($animal));
              return true;
        } elseif ($animal->currentLevelFood<$animal->maxLevelFood && $animal->inBox == 0) {
              $animal->currentLevelFood += rand(0,$animal->weight($animal));
              return false;
        } else $this->isHungry($animal);
    }

    /**
     * @param Animal $animal
     * Проверка голодное ли животное
     * @return bool
     *
     */
    public function isHungry(Animal $animal):bool
    {
        if (($animal->maxLevelFood-$animal->currentLevelFood<50)) {
                return true;
        } else {
            return false;
        }
    }

    /**
     * Функция проверяющая какое животное готово сходить
     * в туалет(необходимо, чтобы текущее значение еды
     * было равно, либо превышало значение maxLevel(максимальное количество еды))
     */
    public function ifAnimalToilet():bool
    {
            if ($this->currentLevelFood >= $this->maxLevelFood) {
                $this->currentLevelFood = $this->currentLevelFood-80;
                $this->setWeightOfWaste($this->getWeightOfWaste()+80);
                return true;
            } else {
                return false;
            }
    }


}