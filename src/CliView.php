<?php

namespace App;

use App\Abstracts\View;

class CliView extends View
{
    /**
     * @param array $arr
     * "View" для cli.php - консоль
     */
    public function view(array $arr)
    {
        echo "Количество животных в коробке " . $arr['animals'] . "\n";
        echo "Количество животных вне коробки" . $arr['animalsOut'] . "\n";
        echo "Количество кошек в коробке " . $arr['countCatIn'] . "\n";
        echo "Количество собак в коробке " . $arr['countDogIn'] . "\n";
        echo "Количество кошек вне коробки " . $arr['countCatOut'] . "\n";
        echo "Количество собак вне коробки " . $arr['countDogOut'] . "\n";
        echo "Количество сытых в коробке " . $arr['countNotHungryIn'] . "\n";
        echo "Количество голодных в коробке " . $arr['countHungryIn'] . "\n";
        echo "Количество голодных вне коробки " . $arr['countHungryOut'] . "\n";
        echo "Количество сытых вне коробки " . $arr['countNotHungryOut'] . "\n";
        if($arr['clear'] == true) {
            echo "Пора убираться!";
        } else echo "Не надо убираться!";
    }
}