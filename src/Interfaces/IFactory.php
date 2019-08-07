<?php

namespace App\Interfaces;

interface IFactory
{
    /**
     * Создание животных и коробки
     * @param $parameter
     * @return mixed
     */
   static public function create($parameter);
}