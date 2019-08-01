<?php

namespace App;

use App\Abstracts\Animal;
use App\Abstracts\ParameterParser;
use App\Interfaces\ICounter;
use App\Traits\Waste;

class Box implements ICounter
{
    /**
     * Трейт экскрементов
     */
    use Waste;
    /**
     * Площадь коробки
     */
//    const SQUARE = 10000;
    protected $volumeOfBox;
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

//    protected $storageOfPetOut = array();
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
     * @param $volumeOfBox
     */
    public function __construct($colour, $volumeOfBox)
    {
        $this->colour = $colour;
        $this->volumeOfBox = $volumeOfBox;
    }

    /**
     * @param Animal $animal
     * @param ParameterParser $parameter
     * @return bool
     * Добавление животных в коробку,
     * проверяем поместится ли животное в коробку.
     * Устанавливаем флаг inBox и занимаем площадь
     */
    public function addAnimal(Animal $animal, ParameterParser $parameter):bool
    {
            if (($this->currentSpace + $animal->getVolumeAnimal()) < $parameter->getBoxVolume()) {
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
     * @return bool
     * Кормление животных и проверка необходимо ли им в туалет
     */
    public function animalEatIn():bool
    {
        foreach ($this->storageOfPet as $animal)
        {
            $animal->animalEat($animal);
            $animal->ifAnimalToilet();
            $this->total =  $this->totalWaste();
            $this->animalToilet();
            return true;

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

    /**
     * @return array
     * Количество голодных и сытых в коробке
     */
    public function countIsNotHungry(): array
    {
        $countNotHungry = 0;
        $countHungry    = 0;

        foreach ($this->storageOfPet as $animal) {
            if ($animal->isHungry($animal) == true && $animal->getInBox()==1) {
                $countNotHungry++;
            } elseif ($animal->isHungry($animal) == false && $animal->getInBox()==1) {
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
     * @param ParameterParser $parameter
     * @return array
     * Количество животных помещающихся в коробку
     */
    public function enoughPlace(ParameterParser $parameter)
    {
        $newSpaceCat = 0;
        $newSpaceDog = 0;

        if ($parameter->getBoxVolume() - $this->getCurrentSpace() < $parameter->getBoxVolume() && Cat::class) {
            $newSpaceCat = $parameter->getBoxVolume() - $this->getCurrentSpace();
            $newSpaceCat = $newSpaceCat / 1000;
        }
        if ($parameter->getBoxVolume() - $this->getCurrentSpace() < $parameter->getBoxVolume() && Dog::class) {
            $newSpaceDog = $parameter->getBoxVolume() - $this->getCurrentSpace();
            $newSpaceDog = $newSpaceDog / 1100;
        }
        return ['newSpaceCat'=>$newSpaceCat, 'newSpaceDog'=>$newSpaceDog];
    }

    /**
     * @return array|mixed
     * Количество животных по виду(кошка,собака) в коробке
     */
    public function typeAnimalInOutBox()
    {
        $countDogIn = 0;
        $countCatIn = 0;

        foreach ($this->storageOfPet as $animal) {
            if (get_class($animal) == Dog::class) {
                $countDogIn++;
            } else if (get_class($animal) == Cat::class) {
                $countCatIn++;
            }

        }
        return ['countDogIn'=>$countDogIn,'countCatIn'=>$countCatIn];
    }

}