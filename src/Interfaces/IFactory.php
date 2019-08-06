<?php

namespace App\Interfaces;

use App\Abstracts\ParameterParser;

interface IFactory
{
    /**
     * @param $parameter
     * @return mixed
     * Создание животных и коробки
     */
   static public function create($parameter);
}