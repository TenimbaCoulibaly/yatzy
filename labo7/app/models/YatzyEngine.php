<?php
namespace Yatzy;
class YatzyEngine {
    private $score;

    public function __construct() {
        $this->score = 0;
    }
    public function calculateTurnScore($diceValues) {
        $score = 0;
        foreach ($diceValues as $value) {
            $score += $value * $this->score;
        }
        return $score;
    }
    public function updateTotalScore($turnScore) {
        $this->score += $turnScore;
    }
}