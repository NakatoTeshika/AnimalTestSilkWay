<?php

namespace App;

use App\Abstracts\Animal;

class Dog extends Animal
{
    /**
     * @var int
     * Тип животного необходим, чтобы посчитать сколько кого в коробке
     */
     public $type = 1;
//    protected $dogType = "собака";

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }
    public function animalVoice(): void
    {
        echo "гав гав гав";
    }





}