<?php

namespace App;

class Config
{
    /**
     * Возвращает значение по умолчанию с помощью ключа
     * @param $key
     * @return mixed|null
     */
    public static function get($key)
    {
        $config = [
            'catsName'        => ["Пушок","Белка","Синька","Зеленка","Несси","Васька","Том","Джерри","Скотт"],
            'catsSpecies'     => ["Мейн кун", "Сфинкс", "Британская", "Шотландская", "Бирманская", "Бурма","Норвежская"],
            'catsMaxLevelFood'=> rand(150, 200),
            'catsAge'         => rand(1, 12),
            'catsVolume'      => rand(250, 500),
            'dogsName'        => ["Тайсон", "Цезарь", "Джек", "Умка", "Робин", "Шарик", "Жучка", "Барон","Дружок"],
            'dogsSpecies'     => ["Шпиц", "Пудель","Лайка","Чихуахуа", "Терьер", "Мопс","Лабрадор","Овчарка","Бульдог","Такса"],
            'dogsMaxLevelFood'=> rand(150,200),
            'dogsAge'         => rand(1,15),
            'dogsVolume'      => rand(500, 1000),
            'animalGender'    => ["м", "ж"],
            'animalColour'    => ["Белый",'черный','серый','рыжий','коричневый', 'пыльно-серый'],
            'puppy_count'     => (int)0,
            'kitty_count'     => (int)0,
            'volume_box'      => (int)0,
            'waste'           => 150,
            'weightOfFeed'    => 200
        ];

        $value = isset($config[$key]) ? $config[$key] : null;

        return $value;
    }
}