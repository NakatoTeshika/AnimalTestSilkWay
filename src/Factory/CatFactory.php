<?php

namespace App\Factory;

use App\Cat;
use App\Config;
use App\Interfaces\IFactory;

class CatFactory implements IFactory
{
    /**
     * Создание кошек, по заданному количеству
     * @param $parameter
     * @return array
     */
    static public function create($parameter)
    {
        $cats            = array();
        $name            = Config::get('catsName');
        $species         = Config::get('catsSpecies');
        $genders         = Config::get('animalGender');
        $animalColour    = Config::get('animalColour');
        $catMaxLevelFood = Config::get('catsMaxLevelFood');
        $catAge          = Config::get('catsAge');
        $catVolume       = Config::get('catsVolume');
        $limitKitty      = $parameter;
        $catName         = $name[array_rand($name,1)];
        $catSpecies      = $species[array_rand($species, 1)];
        $catGender       = $genders[array_rand($genders, 1)];
        $catColour       = $animalColour[array_rand($animalColour, 1)];

        while ($limitKitty>0) {
            array_push($cats, new Cat($catName, $catSpecies, $catGender, $catColour,
                                              $catMaxLevelFood, $catAge, $catVolume));
            $limitKitty--;
        }
        return $cats;
    }
}