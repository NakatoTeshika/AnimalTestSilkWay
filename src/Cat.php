<?php

namespace App;

use App\Abstracts\Animal;

class Cat extends Animal
{
    /**
     * Звуки издаваемые кошкой
     */
    public function animalVoice(): void
    {
        echo "мяу мяу мяу";
    }


}