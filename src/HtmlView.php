<?php

namespace App;

use App\Abstracts\View;
use App\Presenter\BoxPresenter;
use App\Presenter\OutOfBoxPresenter;

class HtmlView extends View
{
    /**
     * Вывод всех сообщений в формате HTML
     * @param BoxPresenter $boxPresenter
     * @param OutOfBoxPresenter $outOfBoxPresenter
     */
    public function view(BoxPresenter $boxPresenter, OutOfBoxPresenter $outOfBoxPresenter)
    {
        echo '<link rel="stylesheet" href="/css/style.css">';
        echo '<center>';
        echo '<h2 style="color: peru">Зверюшки</h2>';
        echo '<table border="2" bgcolor="#f5f5dc">';
        echo '<tr><td>' . $boxPresenter->animalCount() . '</td></tr>';
        echo '<tr><td>' . $outOfBoxPresenter->animalCount() . '</td></tr>';
        echo '<tr><td>' . $boxPresenter->countCat() . '</td></tr>';
        echo '<tr><td>' . $boxPresenter->countDog() . '</td></tr>';
        echo '<tr><td>' . $outOfBoxPresenter->countCat() . '</td></tr>';
        echo '<tr><td>' . $outOfBoxPresenter->countDog() . '</td></tr>';
        echo '<tr><td>' . $boxPresenter->countNotHungry() . '</td></tr>';
        echo '<tr><td>' . $boxPresenter->countHungry() . '</td></tr>';
        echo '<tr><td>' . $outOfBoxPresenter->countHungry() . '</td></tr>';
        echo '<tr><td>' . $outOfBoxPresenter->countNotHungry() . '</td></tr>';
        echo '<tr><td>' . $boxPresenter->countIsAddCat() . $outOfBoxPresenter->countIsAddCat() .'</td></tr>';
        echo '<tr><td>' . $boxPresenter->countIsAddDog(). $outOfBoxPresenter->countIsAddDog() . '</td></td>';
        echo '<tr><td>' . $boxPresenter->spaceForCat() . '</td></tr>';
        echo '<tr><td>' . $boxPresenter->spaceForDog() . '</td></tr>';
        echo '<tr><td>' . $boxPresenter->messageClear() . '</td></tr>';
        echo '</table>';
        echo '</center>';
        echo '</body>';
    }
}