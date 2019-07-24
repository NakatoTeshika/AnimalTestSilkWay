<?php

namespace App;

use App\Abstracts\Animal;

class Box
{
    use Waste;
    /**
     * Площадь коробки
     */
    const SQUARE = 10000;
    protected $colour;
    /**
     * Лимит экскрементов
     */
    const WASTE= 100;
    protected $storageOfPet = array();
    protected $currentSpace = 0;
    /**
     * @var Количество экскрементов на данный момент
     */
    protected $total;

    public function __construct($colour)
    {
        $this->colour = $colour;
    }

    /**
     * @param Animal $animal
     * Добавление животных в коробку,
     * проверяем поместится ли животное в коробку.
     * Устанавливаем флаг inBox и занимаем площадь
     */
    public function addAnimal(Animal $animal)
    {
            if (($this->currentSpace + $animal->getVolumeAnimal()) < self::SQUARE) {
                $animal->setInBox(1);
                array_push($this->storageOfPet, $animal);
                $this->currentSpace += $animal->getVolumeAnimal();
            } elseif ($this->currentSpace + $animal->getVolumeAnimal() > self::SQUARE) {
                $animal->setInBox(0);
                echo "------------------------------ \n";
                echo "В коробке больше нет места \n";
                echo "------------------------------ \n";
            }
        //inBox = 1, для определения в коробке находится животное или нет
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
        echo "Зверюшка" . " " . $animal->getName() . " " . "успешно удалена! \n";
    }

    /**
     * Вывод животных из коробки
     */
    public function getAnimals():void
    {
        foreach ($this->storageOfPet as $pets) {
            print_r($pets);
        }
    }

    /**
     * @param Animal $animal
     * Проверка, находится ли животное в коробке
     */
    public function ifInBox(Animal $animal)
    {
        if ($animal->getInBox()== 1) {
            $animal->animalEat($animal);
            $animal->ifAnimalToilet();
            $this->total =  $this->totalWaste() . "\n";
//            echo $this->total;
            $this->animalToilet();
//            print_r("Все зверюшки в коробке накормлены \n");

        } else {
            echo "Животное" . " ". $animal->getName()." "."не в коробке, но будет накормлен \n";
            $animal->animalEat($animal);
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
    public function animalToilet(): void
    {
        if ($this->total >= self::WASTE) {
            $this->clearBox();
        } else
            echo "Еще рано убираться \n";
    }

    /**
     * Очистка коробки
     */
    public function clearBox(): void
    {
        print_r("Пора убираться! \n");
        $this->setWeightOfWaste(0);
        echo "============================".$this->total;
    }

}