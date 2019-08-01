<?php

namespace App;

use App\Abstracts\Counter;

class HtmlCounter extends Counter
{
    /**
     * @return array|mixed
     * Получение значений из браузерной строки используя _GET
     */
    public function animalCounter()
    {
        $count       = [];
        $puppy_count = $_GET['puppy_count'];
        $kitty_count = $_GET['kitty_count'];
        if (isset($puppy_count)) {
            $count['puppy_count'] = $_GET['puppy_count'];
        }
        if (isset($kitty_count)) {
            $count['kitty_count'] = $_GET['kitty_count'];
        }
        return $count;
    }
}