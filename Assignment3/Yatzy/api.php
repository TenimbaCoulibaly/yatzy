<?php
//<!-- Tenimba Coulibaly 300086545 --> 
session_start();

// Check if game state exists, if not initialize
function initializeGameState() {
    if (!isset($_SESSION['game'])) {
        $_SESSION['game'] = [
            'player1Dice' => [],
            'player2Dice' => [],
            'rollCount' => 0,
            'isPlayerOneTurn' => true, // Example flag to indicate whose turn it is
        ];
    }
}

//Implement game logic

//Function to handle dice rolling
function rollDice() {

    initializeGameState();

    // Increment the roll count for the current turn
    $_SESSION['game']['rollCount']++;

    //Generate an array of 5 random dice rolls
    $randomDice = [];
    for ($i = 0; $i < 5; $i++) {
        $randomDice[] = rand(1, 6);
    }
    
    // Assign dice to the current player
    $key = $_SESSION['game']['isPlayerOneTurn'] ? 'player1Dice' : 'player2Dice';
    $_SESSION['game'][$key] = $randomDice;

    // Example action based on rollCount
    if ($_SESSION['game']['rollCount'] >= 3) {
        // Disable further rolls by not updating the dice any further
        $disableRoll = true;
    } else {
        $disableRoll = false;
    }

    // Return results and the state of the roll button
    return [
        'dice' => $randomDice,
        'disableRoll' => $disableRoll,
        'rollCount' => $_SESSION['game']['rollCount'],
        'isPlayerOneTurn' => $_SESSION['game']['isPlayerOneTurn'], 
    ];
}

// Handle the rollDice action
if (isset($_GET['action']) && $_GET['action'] == 'rollDice') {
    $result = rollDice();
    echo json_encode($result);
    exit();
}

function calculateOnes($dice) {
    return array_sum(array_map(function($die) { return $die == 1 ? 1 : 0; }, $dice));
}

function calculateTwos($dice) {
    return array_sum(array_map(function($die) { return $die == 2 ? 2 : 0; }, $dice));
}

function calculateThrees($dice) {
    return array_sum(array_map(function($die) { return $die == 3 ? 3 : 0; }, $dice));
}

function calculateFours($dice) {
    return array_sum(array_map(function($die) { return $die == 4 ? 4 : 0; }, $dice));
}

function calculateFives($dice) {
    return array_sum(array_map(function($die) { return $die == 5 ? 5 : 0; }, $dice));
}

function calculateSixes($dice) {
    return array_sum(array_map(function($die) { return $die == 6 ? 6 : 0; }, $dice));
}

function calculateThreeOfAKind($dice) {
    foreach (array_count_values($dice) as $value => $count) {
        if ($count >= 3) {
            return array_sum($dice);
        }
    }
    return 0;
}

function calculateFourOfAKind($dice) {
    foreach (array_count_values($dice) as $value => $count) {
        if ($count >= 4) {
            return array_sum($dice);
        }
    }
    return 0;
}

function calculateFullHouse($dice) {
    $values = array_count_values($dice);
    if (in_array(3, $values) && in_array(2, $values)) {
        return 25;
    }
    return 0;
}

function calculateSmallStraight($dice) {
    $uniqueDice = array_unique($dice);
    sort($uniqueDice);
    $straight = implode('', $uniqueDice);
    if (strpos('1234', $straight) !== false || strpos('2345', $straight) !== false || strpos('3456', $straight) !== false) {
        return 30;
    }
    return 0;
}

function calculateLargeStraight($dice) {
    sort($dice);
    $straight = implode('', $dice);
    if ($straight === '12345' || $straight === '23456') {
        return 40;
    }
    return 0;
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $response = ['success' => false];

    $action = $_POST['action'] ?? '';

    if ($action === 'updateScores') {
        $dice = $_POST['dice'] ?? [];
        // Assume dice is an array of integers, validate as needed
        $_SESSION['game']['dice'] = $dice; // Store dice for further operations if needed

        // Calculate and update scores for the current turn
        // Dummy implementation, replace with your actual logic
        $scores = [
            'ones' => calculateOnes($dice),
            'twos' => calculateTwos($dice),
            'threes' => calculateThrees($dice),
            'fours' => calculateFours($dice),
            'fives' => calculateFives($dice),
            'sixes' => calculateSixes($dice),
            'threeOfAKind' => calculateThreeOfAKind($dice),
            'fourOfAKind' => calculateFourOfAKind($dice),
            'fullHouse' => calculateFullHouse($dice),
            'smallStraight' => calculateSmallStraight($dice),
            'largeStraight' => calculateLargeStraight($dice),
        ];

        // Update the session or perform other actions based on the calculated scores
        $_SESSION['game']['playerScores']['player1'][0] = $scores['ones']; // Example for player1 'ones' score

        $response = ['success' => true, 'scores' => $scores];

    echo json_encode($response);
    exit;
}}