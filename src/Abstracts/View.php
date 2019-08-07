<?php

namespace App\Abstracts;

use App\Presenter\BoxPresenter;
use App\Presenter\OutOfBoxPresenter;

abstract class View
{
    /**
     *Отображение результатов выполнения функций
     * @param BoxPresenter $boxPresenter
     * @param OutOfBoxPresenter $outOfBoxPresenter
     * @return mixed
     */
    abstract public function view(BoxPresenter $boxPresenter, OutOfBoxPresenter $outOfBoxPresenter);
}