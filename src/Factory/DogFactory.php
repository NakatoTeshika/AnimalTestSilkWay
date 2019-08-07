<?php

namespace App\Factory;

use App\Dog;
use App\Interfaces\IFactory;

class DogFactory implements IFactory
{
    /**
     * Создание щенят, по заданному количеству
     * @param $parameter
     * @return array|mixed
     */
    static public function create($parameter)
    {
        $dogs            = array();
        $name            = ["Тайсон", "Цезарь", "Джек", "Умка", "Робин", "Шарик", "Жучка", "Барон","Дружок"];
        $species         = ["Шпиц", "Пудель","Лайка","Чихуахуа", "Терьер", "Мопс","Лабрадор","Овчарка","Бульдог","Такса"];
        $genders         = ["ж","м"];
        $animalColour    = ["белый", "черный", "серый", "рыжий"];
        $limitPuppy      = $parameter;
        $dogName         = $name[array_rand($name, 1)];
        $dogSpecies      = $species[array_rand($species,1)];
        $dogGender       = $genders[array_rand($genders, 1)];
        $dogColour       = $animalColour[array_rand($animalColour,1)];
        $dogMaxLevelFood = rand(150,250);
        $dogAge          = rand(1,15);
        $dogVolume       = rand(500, 1000);

        while ($limitPuppy>0) {
            array_push($dogs, new Dog($dogName ,  $dogSpecies , $dogGender, $dogColour,
                                              $dogMaxLevelFood, $dogAge , $dogVolume));
            $limitPuppy--;
        }
        return $dogs;
    }
}