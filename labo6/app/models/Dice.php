<?php

class Dice {
    public function roll($min, $max) {
        return rand($min, $max);
    }
}

$dice = new Dice();
$result = $dice->roll(1, 6); // Lance un dé à 6 faces
echo "Résultat du tirage : " . $result;

?>
