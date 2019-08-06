<?php

namespace App;

use App\Abstracts\ParameterParser;
use App\Abstracts\View;
use App\Patterns\BoxFactory;
use App\Patterns\BoxPresenter;
use App\Patterns\CatFactory;
use App\Patterns\DogFactory;
use App\Patterns\FoodFactory;
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
        $box               = BoxFactory::create($parameter->getBoxVolume());
        $dogs              = DogFactory::create($parameter->getPuppyCount());
        $cats              = CatFactory::create($parameter->getKittyCount());
        $feeds             = FoodFactory::create($parameter->getPuppyCount()+$parameter->getKittyCount());
        $animals           = array_merge($dogs, $cats);
        $boxPresenter      = new BoxPresenter($box,$parameter);
        $outOfBox          = new OutOfBox();
        $outOfBoxPresenter = new OutOfBoxPresenter($outOfBox);
        $insert            = new AddAnimal();

        shuffle($animals);
        $insert->addToSomewhere($box,$outOfBox,$animals);

        foreach ($animals as $animal) {
            $animal->animalEat(array_pop($feeds));
        }

        $box->animalToilet();
        $outOfBox->animalToilet();
        $box->animalToiletIn();
        $view->view($boxPresenter, $outOfBoxPresenter);
        $box->clear();
    }
}