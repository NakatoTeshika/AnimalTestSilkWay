<?php

namespace App\Abstracts;

abstract class Presenter
{
    /**
     * @return string
     * Возвращает строку количество животных в коробке и вне коробки
     */
    abstract public function animalCount():string;

    /**
     * @return string
     * Возвращает строку сколько кошек было добавлено и не добавлено
     */
    abstract public function countIsAddCat():string;

    /**
     * @return string
     * Возвращает строку сколько щенков было добавлено и не добавлено
     */
    abstract public function countIsAddDog():string;

    /**
     * @return mixed
     * Возвращает строку с количество кошек в коробке и вне коробки
     */
    abstract public function countCat();

    /**
     * @return mixed
     * Возвращает количество щенят в коробку и вне коробки
     */
    abstract public function countDog();

    /**
     * @return mixed
     * Возвращает строку с количеством сытых в коробке и вне коробки
     */
    abstract public function countNotHungry();

    /**
     * @return mixed
     * Возвращает строку с количеством голодных в коробке и вне коробки
     */
    abstract public function countHungry();
}