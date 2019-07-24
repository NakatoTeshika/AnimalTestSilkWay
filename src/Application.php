<?php

namespace App;

class Application
{
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

        $animalTest = new Cat('Tom', 'C', 'm', 'grey', 200,35, 5, 250);

        $box->addAnimal($animalTest);

        foreach ($animals as $animal) {
            $box->addAnimal($animal);
            $box->ifInBox($animal);
//        $box->animalToilet($animal);
//        $box->toiletBox($animal);
        }

        $box->takeAnimal($animalTest);

        //print_r($box->storageOfPet);
        $box->getAnimals();

        /**
         * Counter для животных ВНЕ и В коробке
         */
        $countDogIn = 0;
        $countCatIn = 0;
        $countDogOut = 0;
        $countCatOut = 0;
        foreach ($animals as $animal) {
            if ($animal->getType() == 1 && $animal->getInBox() == 1) {
                $countDogIn++;
            } else if($animal->getType() == 0 && $animal->getInBox()==1) {
                $countCatIn++;
            } else if($animal->getType() == 1 && $animal->getInBox() == 0) {
                $countDogOut++;
            } else if($animal->getType() == 0 && $animal->getInBox() == 0) {
                $countCatOut++;
            }
        }
        echo "Количество кошек в коробке - " . $countCatIn . " " . "и собак - " . $countDogIn . "\n";
        echo "Количество кошек вне коробки - " . $countCatOut . " " . "и собак - " . $countDogOut . "\n";
//    foreach ($animals as $animal)
//    {
//        print_r($animal);
//    }
//    $box->checkToilet();
//    $box->getAteAnimals();

//    $box->typeAnimal($animalTest);
//    print_r($box->currentSpace); чтобы вывести нужно поставить public currentSpace

//    foreach ($animals as $animal)
//    {
//        $box->typeAnimal($animal);
//    }
//    foreach ($animals as $animal)
//    {
//        print_r($animal);
//    }
    }
}