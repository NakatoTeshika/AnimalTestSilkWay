<?php

namespace App;

use App\Abstracts\View;

class HtmlView extends View
{
    /**
     * @param array $arr
     * "View" для index.php - браузер
     */
    public function view(array $arr)
    {
        echo "Количество животных в коробке "   . $arr['animals']           . "<br />";
        echo "Количество кошек в коробке "      . $arr['countCatIn']        . "<br />";
        echo "Количество собак в коробке "      . $arr['countDogIn']        . "<br />";
        echo "Количество кошек вне коробки "    . $arr['countCatOut']       . "<br />";
        echo "Количество собак вне коробки "    . $arr['countDogOut']       . "<br />";
        echo "Количество сытых в коробке "      . $arr['countNotHungryIn']  . "<br />";
        echo "Количество голодных в коробке "   . $arr['countHungryIn']     . "<br />";
        echo "Количество голодных вне коробки " . $arr['countHungryOut']    . "<br />";
        echo "Количество сытых вне коробки "    . $arr['countNotHungryOut'] . "<br />";
        echo "=================================================================== " . "<br />";
        echo "Было добавлено собак = " .$arr['addedDog']. " не было добавлено = " . $arr['notAddedDog'] ."<br/>";
        echo "Было добавлено кошек = " .$arr['addedCat']. " не было добавлено = " . $arr['notAddedCat'] ."<br/>";
        echo "=================================================================== <br/>";
        echo (int)$arr['newSpaceCat'] . " столько котиков может поместиться в коробку <br/>";
        echo (int)$arr['newSpaceDog'] . " столько щеночков может поместиться в коробку <br/>";
        if($arr['clear'] == true) {
            echo "Пора убираться!";
        } else echo "Не надо убираться!";
    }
}