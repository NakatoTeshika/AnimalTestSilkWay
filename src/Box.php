<?php

namespace App;

use App\Abstracts\Animal;

class Box
{
    /**
     * Площадь коробки
     */
    protected $volumeOfBox;

    /**
     * Лимит экскрементов
     */
    static $WASTE;

    /**
     * Массив животных в коробке
     * @var array
     */
    public $storageOfPet = array();

    /**
     * Площадь занятая на текущий момент
     * @var int
     */
    protected $currentSpace = 0;

    /**
     * Экскременты в коробке
     * @var array
     */
    public $wasteBox = [];

    /**
     * Box constructor.
     * @param $volumeOfBox
     */
    public function __construct($volumeOfBox)
    {
        $this->volumeOfBox = $volumeOfBox;
        self::$WASTE = Config::get('waste');
    }

    /**
     * Добавление животных в коробку,
     * проверяем поместится ли животное в коробку.
     * Устанавливаем флаг inBox и занимаем площадь
     * @param Animal $animal
     * @return bool
     */
    public function addAnimal(Animal $animal):bool
    {
            if (($this->currentSpace + $animal->getVolumeAnimal()) < $this->volumeOfBox) {
                array_push($this->storageOfPet, $animal);

                $this->currentSpace += $animal->getVolumeAnimal();

                return true;
            } else
                return false;
    }

    /**
     * Функция для вытаскивания животного из коробки
     * @param Animal $animal
     */
    public function takeAnimal(Animal $animal)
    {
        foreach ($this->storageOfPet as $key=>$value) {
            if ($value == $animal) {
                unset($this->storageOfPet[$key]);

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
     * Поход в  туалет
     */
    public function animalToilet()
    {
        foreach ($this->storageOfPet as $animal) {
            $this->wasteBox = array_merge($this->wasteBox, $animal->ifAnimalToilet());
        }
    }

    /**
     * Возвращает тотал экскрементов
     */
    public function total()
    {
        array_reduce($this->wasteBox,  function ($val1,$val2) {
            $val1 += $val2->getWeightOfWaste()->getWeightOfFeed();

            return $val1;
        });
    }

    /**
     * Определитель для уборки коробки: когда убраться в коробке
     * @return bool
     */
    public function animalWaste()
    {
       if( $this->total() > self::$WASTE) {
            return true;
        } else {
           return false;
       }
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
        $this->wasteBox = [];
    }

    /**
     * Количество голодных в коробке
     * @return int
     */
    public function countIsHungry(): int
    {
        $countHungry = 0;

        foreach ($this->storageOfPet as $animal) {
            if ($animal->isHungry($animal) == true) {
                $countHungry++;
            }
        }
        return $countHungry;
    }

    /**
     * Количество сытых в коробке
     * @return int
     */
    public function countIsNotHungry():int
    {
        $countNotHungry = 0;

        foreach ($this->storageOfPet as $animal) {
            if ($animal->isHungry($animal) == false) {
                $countNotHungry++;
            }
        }
        return $countNotHungry;
    }

    /**
     * Количество кошек в коробке. Сколько было добавлено
     * @return array|mixed
     */
    public function catsAddedCount()
    {
        $addedCat = 0;

        foreach ($this->storageOfPet as $animal) {
            if (is_a($animal,Cat::class)) {
                $addedCat++;
            }
        }
        return $addedCat;
    }

    /**
     * Количество собак в коробке. Сколько было добавлено
     * @return int
     */
    public function dogsAddedCount()
    {
        $addedDog = 0;

        foreach ($this->storageOfPet as $animal) {
            if (is_a($animal, Dog::class)) {
                $addedDog++;
            }
        }
        return $addedDog;
    }

    /**
     * Количество животных помещающихся в коробку - собак
     * @return float|int
     */
    public function placeForDog():int
    {
        $howDogsFit = 0;

        if ($this->volumeOfBox - $this->currentSpace < $this->volumeOfBox && Dog::class) {
            $howDogsFit = $this->volumeOfBox - $this->currentSpace;
            $howDogsFit =$howDogsFit / 1100;
        }
        return $howDogsFit;
    }

    /**
     * Количество животных помещающихся в коробку - кошек
     * @return int
     */
    public function placeForCat():int
    {
        $howCatsFit = 0;

        if ($this->volumeOfBox - $this->currentSpace < $this->volumeOfBox && Cat::class) {
            $howCatsFit = $this->volumeOfBox - $this->currentSpace;
            $howCatsFit = $howCatsFit / 1000;
        }
        return $howCatsFit;
    }
}