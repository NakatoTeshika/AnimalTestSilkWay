<?php


namespace App\Patterns;


use App\Interfaces\IFactory;
use App\Traits\Feed;

class FoodFactory implements IFactory
{
    /**
     * @param $parameter
     * @return mixed
     * Создание порции корма
     */
    static public function create($parameter)
    {
        $feed = [];
        while($parameter>0)
        {
            $weightOfFeed = 150;
            array_push($feed, new Feed($weightOfFeed));
            $parameter--;
        }

        return $feed;
    }
}