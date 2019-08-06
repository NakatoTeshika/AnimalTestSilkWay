<?php

namespace App;


class AddAnimal
{
    /**
     * @param Box $box
     * @param OutOfBox $outOfBox
     * @param array $animals
     */
    public function addToSomewhere(Box $box, OutOfBox $outOfBox, array $animals)
    {
        foreach ($animals as $animal) {
            if (!$box->addAnimal($animal)) {
                $outOfBox->addOut($animal);
            }
        }
    }
}