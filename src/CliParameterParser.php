<?php


namespace App;


use App\Abstracts\Counter;

class CliParametrParser extends Counter
{
    /**
     * @return array|mixed
     * Получение значений из консоли в виде массива, используя getopt()
     */
    public function animalCounter()
    {
        $variable = [
          'puppy_count:',
          'kitty_count:'
        ];
        $count    = getopt('', $variable);

        return $count;
    }
}