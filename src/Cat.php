<?php

namespace App;

use App\Abstracts\Animal;

class Cat extends Animal
{
    /**
     * Звуки издаваемые кошкой
     */
    public function animalVoice(): string
    {
        return "мяу мяу мяу";
    }
}