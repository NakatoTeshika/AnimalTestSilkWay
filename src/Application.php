<?php

namespace App;

use App\Abstracts\ParameterParser;
use App\Abstracts\View;
use App\Factory\BoxFactory;
use App\Presenter\BoxPresenter;
use App\Factory\CatFactory;
use App\Factory\DogFactory;
use App\Factory\FoodFactory;
use App\Presenter\OutOfBoxPresenter;

class Application
{
    /**
     * "Запускает" все необходимые функции
     * @param View $view
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
        $insert->addTo($box,$outOfBox,$animals);

        foreach ($animals as $animal) {
            $animal->animalEat(array_pop($feeds));
        }

        $box->animalToilet();
        $outOfBox->animalToilet();
        $box->clear();
        $view->view($boxPresenter, $outOfBoxPresenter);
    }
}