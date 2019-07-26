<?php


namespace App\Abstracts;


use App\Interfaces\IView;

abstract class View implements IView
{
    abstract public function view(array $array);
}