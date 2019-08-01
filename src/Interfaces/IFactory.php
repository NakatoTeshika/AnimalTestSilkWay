<?php

namespace App\Interfaces;

use App\Abstracts\ParameterParser;

interface IFactory
{
    /**
     * @param ParameterParser $counter
     * @return mixed
     * Создание животных и коробки
     */
   static public function create(ParameterParser $counter);
}