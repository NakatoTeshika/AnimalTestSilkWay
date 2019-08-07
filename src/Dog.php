<?php

namespace App;

use App\Abstracts\Animal;

class Dog extends Animal
{
    /**
     * Звуки издаваемые собакой
     */
    public function animalVoice(): string
    {
        return "гав гав гав";
    }

}