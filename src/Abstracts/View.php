<?php

namespace App\Abstracts;

abstract class View
{
    /**
     * @param array $array
     * @return mixed
     * Отображение результатов выполнения функций
     */
    abstract public function view(array $array);
}