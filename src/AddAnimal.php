<?php

namespace App;

class AddAnimal
{
    /**
     * Добавление зверюшки на улицу(в массив вне коробки, в случае если не добавили зверюшку в коробку)
     * @param Box $box
     * @param OutOfBox $outOfBox
     * @param array $animals
     */
    public function addTo(Box $box, OutOfBox $outOfBox, array $animals)
    {
        foreach ($animals as $animal) {
            if (!$box->addAnimal($animal)) {
                $outOfBox->add($animal);
            }
        }
    }
}