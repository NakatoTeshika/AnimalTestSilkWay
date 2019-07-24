<?php

namespace App\Abstracts;

use App\Feed;
use App\Interfaces\IAnimal;
use App\Waste;

abstract class Animal implements IAnimal
{
    use Feed;
    use Waste;
    protected $name;
    protected $species;
    protected $gender;
    protected $animalColour;
    protected $maxLevelFood;
    protected $currentLevelFood;
    protected $age;
    protected $volumeAnimal;
    protected $inBox = 0;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getInBox(): int
    {
        return $this->inBox;
    }

    /**
     * @param mixed $volumeAnimal
     */
    public function setVolumeAnimal($volumeAnimal): void
    {
        $this->volumeAnimal = $volumeAnimal;
    }

    /**
     * @return mixed
     */
    public function getVolumeAnimal()
    {
        return $this->volumeAnimal;
    }

    public function __construct($name, $species, $gender, $animalColour, $maxLevelFood, $currentLevelFood, $age, $volumeAnimal)
    {
        $this->name = $name;
        $this->species = $species;
        $this->gender = $gender;
        $this->animalColour = $animalColour;
        $this->maxLevelFood = $maxLevelFood;
        $this->currentLevelFood = $currentLevelFood;
        $this->age = $age;
        $this->volumeAnimal = $volumeAnimal;
    }

    /**
     * @return bool
     * Функция ползает ли животное, возвращает true, так как и те и другие ползают
     */
    public function animalCreep(): bool
    {
        return true;
    }

    /**
     * Функция какой звук издает животное. Реализуется в классах Cat и Dog
     */
    abstract public function animalVoice(): void;

    public function setInBox($inBox)
    {
        $this->inBox = $inBox;
    }

    /**
     * @param Animal $animal
     * Функция кормления животных, сравнивает значения текущего уровня сытости и максимального,
     * и св-во в коробке ли животное
     * ->
     * к текущему уровню сытости прибавляем рандомное число
     */
    public function animalEat(Animal $animal):void
    {
        if ($animal->currentLevelFood < $animal->maxLevelFood && $animal->inBox == 1) {
            echo "------------------------------ \n";
            print_r("Накормленая зверюшка в коробке - " . " " . $animal->name . "\n" ."До обеда: " .$animal->currentLevelFood. "; Уровень сытости - ");
            echo $animal->currentLevelFood += rand(0,$animal->weight($animal));
            print_r("\n");
        } elseif ($animal->currentLevelFood<$animal->maxLevelFood && $animal->inBox == 0) {
            print_r("Накормленая зверюшка вне коробки - " . " " . $animal->name . "\n" ."До обеда: " .$animal->currentLevelFood. "; Уровень сытости - ");
            echo $animal->currentLevelFood += rand(0,$animal->weight($animal));
            print_r("\n");
        } else "Больше корма нет!!!";
            $this->isHungry($animal);
    }

    /**
     * @param Animal $animal
     * Проверка голодное или сытое животное
     */
    public function isHungry(Animal $animal)
    {
        if (($animal->maxLevelFood-$animal->currentLevelFood<50)) {
            echo "Сытый \n";
//            $count++;
//            print_r("Количество накормленных щенят в коробке " . " ".$count);
        } else echo "Голодный \n";
//            print_r("Количество накормленных котят в коробке" . " ");
   }

    /**
     * Функция проверяющая какое животное готово сходить
     * в туалет(необходимо, чтобы текущее значение еды
     * было равно, либо превышало значение maxLevel(максимальное количество еды))
     */
    public function ifAnimalToilet():void
    {
//        if ($this->currentLevelFood+100 >= $this->maxLevelFood) {
            if ($this->currentLevelFood >= $this->maxLevelFood) {
                $this->currentLevelFood = $this->currentLevelFood-80;
                $this->setWeightOfWaste($this->getWeightOfWaste()+80);
            } else {
                echo "Зверюшка еще не готова! \n";
            }
    }
}