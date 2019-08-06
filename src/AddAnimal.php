<?php

namespace App;


class AddToSomewhere
{
    /**
     * @param Box $box
     * @param OutOfBox $outOfBox
     * @param array $animals
     */
    public function insertInto(Box $box, OutOfBox $outOfBox, array $animals)
    {
        foreach ($animals as $animal) {
            if (!$box->addAnimal($animal)) {
                $outOfBox->addOut($animal);
            }
        }
    }
}