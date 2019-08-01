<?php

namespace App\Abstracts;

use App\Patterns\BoxPresenter;
use App\Patterns\OutOfBoxPresenter;

abstract class View
{
    /**
     * @param BoxPresenter $boxPresenter
     * @param OutOfBoxPresenter $outOfBoxPresenter
     * @return mixed
     * Отображение результатов выполнения функций
     */
    abstract public function view(BoxPresenter $boxPresenter, OutOfBoxPresenter $outOfBoxPresenter);
}