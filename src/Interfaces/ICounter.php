<?php

namespace App\Interfaces;

interface ICounter
{
    /**
     * @return mixed
     * Подсчитывает количество добавленных в коробку и не добавленных животных
     */
    public function countIsAdd();

    /**
     * @return mixed
     * Подсчитывает количество голодных и сытых в коробке и вне коробки
     */
    public function countIsNotHungry();
}