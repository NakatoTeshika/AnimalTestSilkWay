<?php

namespace App;

use App\Abstracts\View;
use App\Patterns\BoxPresenter;
use App\Patterns\OutOfBoxPresenter;

class HtmlView extends View
{
    /**
     * @param BoxPresenter $boxPresenter
     * @param OutOfBoxPresenter $outOfBoxPresenter
     * Вывод всех сообщений в формате HTML
     */
    public function view(BoxPresenter $boxPresenter, OutOfBoxPresenter $outOfBoxPresenter)
    {
        echo $boxPresenter->animalCount() . "<br />";
        echo $outOfBoxPresenter->animalCount() . "<br />";
        echo $boxPresenter->countCat() . "<br />";
        echo $boxPresenter->countDog() . "<br />";
        echo $outOfBoxPresenter->countCat() . "<br />";
        echo $outOfBoxPresenter->countDog() . "<br />";
        echo $boxPresenter->countNotHungry() . "<br />";
        echo $boxPresenter->countHungry() . "<br />";
        echo $outOfBoxPresenter->countHungry() . "<br />";
        echo $outOfBoxPresenter->countNotHungry() . "<br />";
        echo "=================================================================== <br />";
        echo $boxPresenter->countIsAddCat() . $outOfBoxPresenter->countIsAddCat() ."<br />";
        echo $boxPresenter->countIsAddDog(). $outOfBoxPresenter->countIsAddDog() ."<br />";
        echo "=================================================================== <br />";
        echo $boxPresenter->spaceForCat(). "<br />";
        echo $boxPresenter->spaceForDog() . "<br />";
        echo "=================================================================== <br />";
        echo $boxPresenter->messageClear() . "<br />";
    }
}