<?php

namespace App;

use App\Abstracts\Animal;
use App\Abstracts\ParameterParser;
use App\Interfaces\ICounter;
use App\Traits\Feed;
use App\Traits\Waste;

class Box implements ICounter
{
    /**
     * Площадь коробки
     */
    protected $volumeOfBox;
    /**
     * @var
     * Цвет коробки
     */
    protected $colour;
    /**
     * Лимит экскрементов
     */
    const WASTE = 15;
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
     * @var
     * Количество экскрементов на данный момент
     */
    protected $total;

    protected $wasteBox = [];

    /**
     * Box constructor.
     * @param $colour
     * Конструктор коробки с одним свойством - цветом коробки
     * @param $volumeOfBox
     */
    public function __construct($colour, $volumeOfBox)
    {
        $this->colour = $colour;
        $this->volumeOfBox = $volumeOfBox;
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
            if (($this->currentSpace + $animal->getVolumeAnimal()) < $this->volumeOfBox) {
                $animal->setInBox(true);
                array_push($this->storageOfPet, $animal);
                $this->currentSpace += $animal->getVolumeAnimal();
                return true;
            } else return false;
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
                $this->currentSpace = $this->currentSpace - $this->volumeOfBox;
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
     * @param Feed $feed
     * @return bool
     * Кормление животных и проверка необходимо ли им в туалет
     */
    public function animalToiletIn():bool
    {
        foreach ($this->storageOfPet as $animal)
        {
            $animal->ifAnimalToilet();

        }
        return true;
    }

    /**
     * Определитель для уборки коробки: когда убраться в коробке
     * @param Waste $waste
     * @return bool
     */
    public function animalToilet()
    {
        foreach ($this->storageOfPet as $animal) {
            $this->wasteBox = array_merge($this->wasteBox, $animal->ifAnimalToilet());
        }
    }

    public function animalWaste()
    {
        if(count($this->wasteBox) == count($this->storageOfPet)) {
            return true;
        } else
        return false;
    }

    /**
     * Очистка коробки
     */
    public function clear()
    {
        if($this->animalWaste()) {
            $this->clearBox();
        }
    }

    /**
     * Удаление всех элементов из массива wastebox - очищение коробки
     */
    public function clearBox()
    {
        unset($this->wasteBox);
    }

    /**
     * @return array
     * Количество голодных и сытых в коробке
     */
    public function countIsNotHungry(): array
    {
        $countNotHungry = 0;
        $countHungry    = 0;

        foreach ($this->storageOfPet as $animal) {
            if ($animal->isHungry($animal) == false) {
                $countNotHungry++;
            } elseif ($animal->isHungry($animal) == true) {
                $countHungry++;
            }
        }
        return ['countNotHungryIn'=>$countNotHungry, 'countHungryIn'=>$countHungry];
    }

    /**
     * @return array|mixed
     * Количество кошек и собак в коробке - не общее число, а по виду животного. Сколько было добавлено
     */
    public function countIsAdd()
    {
        $addedDog    = 0;
        $addedCat    = 0;

        foreach ($this->storageOfPet as $animal) {
            if (is_a($animal, Dog::class)) {
                $addedDog++;
            }
            if(is_a($animal,Cat::class)) {
                $addedCat++;
            }
        }
        return ['addedDog'=>$addedDog, 'addedCat'=>$addedCat];
    }

    /**
     * @return array
     * Количество животных помещающихся в коробку
     */
    public function enoughPlace()
    {
        $newSpaceCat = 0;
        $newSpaceDog = 0;

        if ($this->volumeOfBox - $this->currentSpace < $this->volumeOfBox && Cat::class) {
            $newSpaceCat = $this->volumeOfBox - $this->currentSpace;
            $newSpaceCat = $newSpaceCat / 1000;
        }
        if ($this->volumeOfBox - $this->currentSpace < $this->volumeOfBox && Dog::class) {
            $newSpaceDog = $this->volumeOfBox - $this->currentSpace;
            $newSpaceDog = $newSpaceDog / 1100;
        }
        return ['newSpaceCat'=>$newSpaceCat, 'newSpaceDog'=>$newSpaceDog];
    }
}