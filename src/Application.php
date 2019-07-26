<?php

namespace App;

class Application
{
    /**
     * @var array Массив, который после выполнения функции run заполняется результатами
     */
    public $output = array();

    /**
     * @return mixed "Запускает" все необходимые функции и возвращает массив значений
     */
    public function run()
    {
        $animals = [
            new Dog("Цезарь","Терьер", "м", "черный", 250, 30, 2, 250),
            new Cat("Пушок", "Шотландский", "ж", "Серый", 200, 23, 2, 150 ),
            new Cat("Снежок", "Шотландский", "ж", "Белый", 200, 23, 2, 5000 ),
            new Dog("Тайсон","Терьер", "м", "белый", 250, 30, 2, 2500),
            new Dog("Зак","Бульдог", "м", "Серый", 250, 30, 2, 1000),
            new Cat("Белка", "Обычный", "ж", "Белый", 200, 23, 2, 300 ),
            new Cat("Зеленка", "Мейкун", "ж", "Белый", 200, 23, 2, 500),
            new Cat("Ластик", "Шотландский", "ж", "Белый", 200, 23, 2, 500),
            new Cat("Борис", "Шотландский", "ж", "Белый", 200, 23, 2, 500),
            new Cat("Джерри", "Шотландский", "ж", "Белый", 200, 23, 2, 500 ),
            new Dog("Стайл","Пудель", "м", "Серый", 250, 30, 2, 1000),
            new Dog("Василий","Шпиц", "м", "Серый", 250, 30, 2, 1000),
            new Dog("Незнайка","Лайка", "м", "Серый", 250, 30, 2, 1000),
            new Dog("Смит","Бульдог", "м", "Серый", 250, 30, 2, 1000)

        ];

        $box = new Box('зеленая');
        foreach ($animals as $animal) {
            $box->addAnimal($animal);
            $box->ifInBox($animal);
        }
        $countDogIn = 0;
        $countCatIn = 0;
        $countDogOut = 0;
        $countCatOut = 0;

        foreach ($animals as $animal) {
            if (get_class($animal) == Dog::class && $animal->getInBox() == 1) {
                $countDogIn++;
            } else if (get_class($animal) == Cat::class && $animal->getInBox() == 1) {
                $countCatIn++;
            } else if (get_class($animal) == Dog::class && $animal->getInBox() == 0) {
                $countDogOut++;
            } else if (get_class($animal) == Cat::class && $animal->getInBox() == 0) {
                $countCatOut++;
            }
        }

        $countNotHungry = 0;
        $countHungry = 0;
        foreach ($animals as $animal) {
                if ($animal->isHungry($animal) == true && $animal->getInBox()==1) {
                    $countNotHungry++;
                }
                elseif ($animal->isHungry($animal) == false && $animal->getInBox()==1) {
                    $countHungry++;
                }
            }

        $countNotHungryOut = 0;
        $countHungryOut = 0;
        foreach ($animals as $animal) {
            if ($animal->isHungry($animal) == true && $animal->getInBox()==0) {
                $countNotHungryOut++;
            } elseif ($animal->isHungry($animal) == false && $animal->getInBox()==0) {
                $countHungryOut++;
            }
        }

        $output['countHungryIn'] = $countHungry;
        $output['countNotHungryIn'] = $countNotHungry;
        $output['countHungryOut'] = $countHungryOut;
        $output['countNotHungryOut'] = $countNotHungryOut;
        $output['animalsOut'] = count($animals) - count($box->storageOfPet);
        $output['animals'] = count($box->storageOfPet);
        $output['countCatIn'] = $countCatIn;
        $output['countDogIn'] = $countDogIn;
        $output['countDogOut'] = $countDogOut;
        $output['countCatOut'] = $countCatOut;
        $output['clear'] = $box->animalToilet();

        return $output;
    }
}