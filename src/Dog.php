<?php

namespace App;

use App\Abstracts\Animal;

class Dog extends Animal
{
    /**
     * Звуки издаваемые собакой
     */
    public function animalVoice(): void
    {
        echo "гав гав гав";
    }





}