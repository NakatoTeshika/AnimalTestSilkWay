<?php

namespace App\Factory;

use App\Config;
use App\Interfaces\IFactory;
use App\Feed;

class FoodFactory implements IFactory
{
    /**
     * Создание порции корма
     * @param $parameter
     * @return mixed
     */
    static public function create($parameter)
    {
        $feed = [];

        while ($parameter>0) {
            $weightOfFeed = Config::get('weightOfFeed');

            array_push($feed, new Feed($weightOfFeed));

            $parameter--;
        }
        return $feed;
    }
}