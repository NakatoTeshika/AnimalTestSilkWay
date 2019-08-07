<?php

namespace App\Patterns;

use App\Abstracts\ParameterParser;
use App\Cat;
use App\Interfaces\IFactory;

class CatFactory implements IFactory
{
    /**
     * @param $parameter
     * @return array
     *Создание кошек, по заданному количеству
     */
    static public function create($parameter)
    {
        $cats         = array();
        $name         = ["Пушок","Белка","Синька","Зеленка","Несси","Васька","Том","Джерри","Скотт"];
        $species      = ["Мейн кун", "Сфинкс", "Британская", "Шотландская", "Бирманская", "Бурма","Норвежская"];
        $genders      = ["м","ж"];
        $animalColour = ["Белый",'черный','серый','рыжий','коричневый', 'пыльно-серый'];
        $stomach      = array();
        $limitKitty   = $parameter;
        while($limitKitty>0)
        {
            array_push($cats, new Cat($name[array_rand($name,1)], $species[array_rand($species, 1)],
                                              $genders[array_rand($genders, 1)], $animalColour[array_rand($animalColour, 1)],
                                              rand(150, 200), rand(1, 12), rand(250, 500), $stomach));
            $limitKitty--;

        }
        return $cats;
    }
}