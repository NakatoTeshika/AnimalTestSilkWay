<?php

namespace App;

use App\Abstracts\Animal;
use App\Traits\Waste;

class Box
{
    /**
     * Трейт экскрементов
     */
    use Waste;
    /**
     * Площадь коробки
     */
    const SQUARE = 10000;
    /**
     * @var Цвет коробки
     */
    protected $colour;
    /**
     * Лимит экскрементов
     */
    const WASTE = 100;
    /**
     * @var array Массив животных в коробке
     */
    public $storageOfPet = array();
    /**
     * @var int
     * Площадь занятая на текущий момент
     */
    protected $currentSpace = 0;
    /**
     * @var Количество экскрементов на данный момент
     */
    protected $total;

    /**
     * @return int
     */
    public function getCurrentSpace(): int
    {
        return $this->currentSpace;
    }
    /**
     * Box constructor.
     * @param $colour
     * Конструктор коробки с одним свойством - цветом коробки
     */
    public function __construct($colour)
    {
        $this->colour = $colour;
    }

    /**
     * @param Animal $animal
     * @return bool
     * Добавление животных в коробку,
     * проверяем поместится ли животное в коробку.
     * Устанавливаем флаг inBox и занимаем площадь
     */
    public function addAnimal(Animal $animal):bool
    {
            if (($this->currentSpace + $animal->getVolumeAnimal()) < self::SQUARE) {
                $animal->setInBox(1);
                array_push($this->storageOfPet, $animal);
                $this->currentSpace += $animal->getVolumeAnimal();
                return true;
            } elseif ($this->currentSpace + $animal->getVolumeAnimal() > self::SQUARE) {
                $animal->setInBox(0);
                return false;
            }
    }

    /**
     * @param Animal $animal
     * Функция для вытаскивания животного из коробки
     */
    public function takeAnimal(Animal $animal)
    {
        foreach ($this->storageOfPet as $key=>$value) {
            if ($value == $animal) {
                unset($this->storageOfPet[$key]);
                $animal->setInBox(0);
                $this->currentSpace = $this->currentSpace - $animal->getVolumeAnimal();
            }
        }
    }

    /**
     * Вывод животных из коробки
     */
    public function getAnimals():void
    {
        foreach ($this->storageOfPet as $pets) {
            $pets;
        }
    }

    /**
     * @param Animal $animal
     * @return bool
     * Проверка, находится ли животное в коробке
     */
    public function ifInBox(Animal $animal):bool
    {
        if ($animal->getInBox()== 1) {
            $animal->animalEat($animal);
            $animal->ifAnimalToilet();
            $this->total =  $this->totalWaste();
            $this->animalToilet();
            return true;
        } else {
            $animal->animalEat($animal);
            return false;
        }
    }

    /**
     * @return int
     * counter для Waste
     */
    public function totalWaste():int
    {
        $count = 0;
        foreach ($this->storageOfPet as $pet) {
            $count = $count + $pet->getWeightOfWaste();
        }
        return $count;
    }

    /**
     * Определитель для уборки коробки: когда убраться в коробке
     */
    public function animalToilet(): bool
    {
        if ($this->total >= self::WASTE) {
            $this->clearBox();
            return true;
        } else
            return false;
    }

    /**
     * Очистка коробки
     */
    public function clearBox(): void
    {
        $this->setWeightOfWaste(0);
    }

}