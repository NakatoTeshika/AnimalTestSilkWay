<?php

namespace App\Factory;

use App\Cat;
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
        $name            = ["Пушок","Белка","Синька","Зеленка","Несси","Васька","Том","Джерри","Скотт"];
        $species         = ["Мейн кун", "Сфинкс", "Британская", "Шотландская", "Бирманская", "Бурма","Норвежская"];
        $genders         = ["м","ж"];
        $animalColour    = ["Белый",'черный','серый','рыжий','коричневый', 'пыльно-серый'];
        $limitKitty      = $parameter;
        $catName         = $name[array_rand($name,1)];
        $catSpecies      = $species[array_rand($species, 1)];
        $catGender       = $genders[array_rand($genders, 1)];
        $catColour       = $animalColour[array_rand($animalColour, 1)];
        $catMaxLevelFood = rand(150, 200);
        $catAge          = rand(1, 12);
        $catVolume       = rand(250, 500);

        while ($limitKitty>0) {
            array_push($cats, new Cat($catName, $catSpecies, $catGender, $catColour,
                                              $catMaxLevelFood, $catAge, $catVolume));
            $limitKitty--;
        }
        return $cats;
    }
}