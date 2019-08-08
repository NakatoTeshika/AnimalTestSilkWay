<?php

namespace App\Factory;

use App\Config;
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
        $name            = Config::get('dogsName');
        $species         = Config::get('dogsSpecies');
        $genders         = Config::get('animalGender');
        $animalColour    = Config::get('animalColour');
        $dogMaxLevelFood = Config::get('dogsMaxLevelFood');
        $dogAge          = Config::get('dogsAge');
        $dogVolume       = Config::get('dogsVolume');
        $limitPuppy      = $parameter;
        $dogName         = $name[array_rand($name, 1)];
        $dogSpecies      = $species[array_rand($species,1)];
        $dogGender       = $genders[array_rand($genders, 1)];
        $dogColour       = $animalColour[array_rand($animalColour,1)];

        while ($limitPuppy>0) {
            array_push($dogs, new Dog($dogName ,  $dogSpecies , $dogGender, $dogColour,
                                              $dogMaxLevelFood, $dogAge , $dogVolume));
            $limitPuppy--;
        }
        return $dogs;
    }
}