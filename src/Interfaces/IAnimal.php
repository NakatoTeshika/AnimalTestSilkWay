<?php

namespace App\Interfaces;

use App\Abstracts\Animal;
use App\Traits\Feed;
use App\Traits\Waste;

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
     * @param Feed $feed
     * @return bool
     */
    public function animalEat(Feed $feed): bool;

    /**
     * Определитель нужно ли в туалет
     * @param Waste $waste
     * @return bool
     */
    public function ifAnimalToilet();
}