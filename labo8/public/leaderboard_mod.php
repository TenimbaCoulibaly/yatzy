<?php
// Implementation du leaderboard

$leaderboard = [];
function addToLeaderboard($playerName, $score) {
    global $leaderboard;
    
    $leaderboard[$playerName] = $score;
}
function displayLeaderboard() {
    global $leaderboard;
    echo "Leaderboard:\n";
    foreach ($leaderboard as $player => $score) {
        echo "$player: $score\n";
    }
}
