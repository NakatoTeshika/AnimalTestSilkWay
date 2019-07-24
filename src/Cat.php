<?php

namespace App;

use App\Abstracts\Animal;

class Cat extends Animal
{
//    protected $catType = "кошка";
    /**
     * @var int
     * Тип животного необходим, чтобы посчитать сколько кого в коробке
     */
    public $type = 0;

    public function getType()
    {
        return $this->type;
    }

    public function animalVoice(): void
    {
        echo "мяу мяу мяу";
    }


}