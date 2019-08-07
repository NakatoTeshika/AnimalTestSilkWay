<?php

namespace App\Interfaces;

use App\Feed;

interface IAnimal
{
    /**
     * Какие звуки издает
     */
    public function animalVoice(): string;

    /**
     * Ползает ли животное
     * @return bool
     */
    public function animalCreep(): bool;

    /**
     * Умение потреблять корм
     * @param Feed $feed
     * @return bool
     */
    public function animalEat(Feed $feed): bool;

    /**
     * Определитель нужно ли в туалет
     * @return bool
     */
    public function ifAnimalToilet();
}