<?php
require_once('_config.php');
require_once 'leaderboard_mod.php';

use Yatzy\Dice;

$d = new Dice();

for ($i=1; $i<=5; $i++) {
  echo "ROLL {$i}: {$d->roll()}<br>";
}
