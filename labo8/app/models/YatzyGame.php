<?php

namespace Yatzy;

class YatzyGame {
    private $turn; 
    private $diceValues; 
    private $diceStatus; 

    public function __construct() {
        $this->turn = 0;
        $this->diceValues = array_fill(0, 5, 0);
        $this->diceStatus = array_fill(0, 5, false); 
    }

    public function rollDice() {
        foreach ($this->diceValues as &$value) {
            $value = rand(1, 6); 
    }

$this->diceValues = array_fill(0,5, $this->diceStatus); 
    }

    public function getDiceValues() {
        return $this->diceValues; 
    }

    public function getDiceStatus() {
        return $this->diceStatus; 
    }

    public function setDiceStatus($index, $status) {
        $this->diceStatus[$index] = $status; 
    }

    public function getTurn() {
        return $this->turn; 
    }

    public function setTurn($turn) {
        $this->turn = $turn; 
    }
}

?>
