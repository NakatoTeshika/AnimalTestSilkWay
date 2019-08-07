<?php

namespace App\Patterns;

use App\Abstracts\ParameterParser;
use App\Dog;
use App\Interfaces\IFactory;

class DogFactory implements IFactory
{
    /**
     * @param $parameter
     * @return array|mixed
     * Создание щенят, по заданному количеству
     */
    static public function create($parameter)
    {
        $dogs         = array();
        $name         = ["Тайсон", "Цезарь", "Джек", "Умка", "Робин", "Шарик", "Жучка", "Барон","Дружок"];
        $species      = ["Шпиц", "Пудель","Лайка","Чихуахуа", "Терьер", "Мопс","Лабрадор","Овчарка","Бульдог","Такса"];
        $genders      = ["ж","м"];
        $animalColour = ["белый", "черный", "серый", "рыжий"];
        $stomach      = array();
        $limitPuppy   = $parameter;
        while ($limitPuppy>0) {
            array_push($dogs, new Dog($name[array_rand($name, 1)], $species[array_rand($species,1)],
                                       $genders[array_rand($genders,1)], $animalColour[array_rand($animalColour,1)],
                                       rand(150,250), rand(1,15), rand(500, 1000), $stomach));
            $limitPuppy--;
        }
        return $dogs;
    }
}