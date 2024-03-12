<?php
namespace Yatzy;

class Dice {
    public function roll() {
        $randomNumber = mt_rand(1, 6);
        
        return $randomNumber;
    }
}
