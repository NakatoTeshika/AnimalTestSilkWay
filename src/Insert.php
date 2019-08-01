<?php

namespace App;

use App\Abstracts\ParameterParser;

class Insert
{
    /**
     * @param Box $box
     * @param OutOfBox $outOfBox
     * @param array $animals
     * @param ParameterParser $parameter
     * Добавление животных в массив - не помещающихся животных
     */
    public function insertInto(Box $box, OutOfBox $outOfBox, array $animals, ParameterParser $parameter)
    {
        foreach ($animals as $animal) {
            if (!$box->addAnimal($animal,$parameter)) {
                $outOfBox->addOut($animal);
            }
        }
    }
}