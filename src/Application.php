<?php

namespace App;

use App\Abstracts\ParameterParser;
use App\Abstracts\View;
use App\Patterns\BoxFactory;
use App\Patterns\BoxPresenter;
use App\Patterns\CatFactory;
use App\Patterns\DogFactory;
use App\Patterns\OutOfBoxPresenter;

class Application
{
    /**
     * @return mixed "Запускает" все необходимые функции и возвращает массив значений
     */
    /**
     * @param View $view
     * "Запускает" все необходимые функции
     * @param ParameterParser $parameter
     * @return void
     */
    public function run(View $view, ParameterParser $parameter)
    {
        $box     = BoxFactory::create($parameter);
        $dogs    = DogFactory::create($parameter);
        $cats    = CatFactory::create($parameter);
        $animals = array_merge($dogs, $cats);
        shuffle($animals);
        $boxPresenter = new BoxPresenter($box,$parameter);
        $outOfBox = new OutOfBox();
        $outOfBoxPresenter = new OutOfBoxPresenter($outOfBox);
        $insert = new Insert();
        $insert->insertInto($box,$outOfBox,$animals,$parameter);
        $box->animalEatIn();
        $outOfBox->animalEat();
        $view->view($boxPresenter, $outOfBoxPresenter);
    }
}