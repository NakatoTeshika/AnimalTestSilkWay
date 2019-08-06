<?php

namespace App;

use App\Abstracts\BoxOrNot;
use App\Abstracts\View;
use App\Patterns\BoxPresenter;
use App\Patterns\OutOfBoxPresenter;

class CliView extends View
{
    /**
     * @param BoxPresenter $boxPresenter
     * @param OutOfBoxPresenter $outOfBoxPresenter
     * Вывод всех сообщений
     */
    public function view(BoxPresenter $boxPresenter, OutOfBoxPresenter $outOfBoxPresenter)
    {
        echo $boxPresenter->animalCount() . "\n";
        echo $outOfBoxPresenter->animalCount() . "\n";
        echo $boxPresenter->countCat() . "\n";
        echo $boxPresenter->countDog() . "\n";
        echo $outOfBoxPresenter->countCat() . "\n";
        echo $outOfBoxPresenter->countDog() . "\n";
        echo $boxPresenter->countNotHungry() . "\n";
        echo $boxPresenter->countHungry() . "\n";
        echo $outOfBoxPresenter->countHungry() . "\n";
        echo $outOfBoxPresenter->countNotHungry() . "\n";
        echo "=================================================================== \n";
        echo $boxPresenter->countIsAddCat() ." ". $outOfBoxPresenter->countIsAddCat() ."\n";
        echo $boxPresenter->countIsAddDog() ." ". $outOfBoxPresenter->countIsAddDog() ."\n";
        echo "=================================================================== \n";
        echo $boxPresenter->spaceForCat() . "\n";
        echo $boxPresenter->spaceForDog() . "\n";
        echo "=================================================================== \n";
        echo $boxPresenter->messageClear();
    }
}