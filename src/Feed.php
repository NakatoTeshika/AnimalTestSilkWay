<?php

namespace App;

class Feed
{
    /**
     * Текушая масса корма
     * @var
     */
    protected $weightOfFeed;

    public function __construct($weightOfFeed)
    {
        $this->weightOfFeed = $weightOfFeed;
    }

    /**
     * Так как область видимости protected, для того чтобы получить значение
     * используем getter и возвращаем значение weightOfFeed
     * @return mixed
     */
    public function getWeightOfFeed()
    {
        return $this->weightOfFeed;
    }
}