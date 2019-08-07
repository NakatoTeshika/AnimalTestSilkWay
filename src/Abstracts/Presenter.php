<?php

namespace App\Abstracts;

abstract class Presenter
{
    /**
     * Возвращает строку количество животных в коробке и вне коробки
     * @return string
     */
    abstract public function animalCount():string;

    /**
     * Возвращает строку сколько кошек было добавлено и не добавлено
     * @return string
     */
    abstract public function countIsAddCat():string;

    /**
     * Возвращает строку сколько щенков было добавлено и не добавлено
     * @return string
     */
    abstract public function countIsAddDog():string;

    /**
     * Возвращает строку с количество кошек в коробке и вне коробки
     * @return mixed
     */
    abstract public function countCat();

    /**
     * Возвращает количество щенят в коробку и вне коробки
     * @return mixed
     */
    abstract public function countDog();

    /**
     * Возвращает строку с количеством сытых в коробке и вне коробки
     * @return mixed
     */
    abstract public function countNotHungry();

    /**
     * Возвращает строку с количеством голодных в коробке и вне коробки
     * @return mixed
     */
    abstract public function countHungry();
}