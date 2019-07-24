<?php

namespace App\Interfaces;

use App\Abstracts\Animal;

interface IAnimal
{
    /**
     * Какие звуки издает
     */
    public function animalVoice(): void;

    /**
     * @return bool
     * Ползает ли животное
     */
    public function animalCreep(): bool;

    /**
     * @param Animal $animal
     * Кормление животных
     */
    public function animalEat(Animal $animal): void;//integer || bool

    /**
     * Определитель нужно ли в туалет
     */
    public function ifAnimalToilet(): void;//integer || bool
}