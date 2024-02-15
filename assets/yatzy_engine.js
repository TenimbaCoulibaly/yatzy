function calculScore(game, scoreType) {
    let score = 0;
    const values = game.dice;
    switch (scoreType) {
        case "ones":
            score = values.filter(dice => dice === 1).reduce((sum, dice) => sum + dice, 0);
            break;
        case "twos":
            score = values.filter(dice => dice === 2).reduce((sum, dice) => sum + dice, 0);
            break;
        default:
            score = 0;
            break;
    }
    return score;
}
function newScore(game) {
    const scoreTypes = ["ones", "twos", "threes", "fours", "fives", "sixes"];
    let totalScore = 0;
    for (const scoreType of scoreTypes) {
        const turnScore = calculScore(game, scoreType);
        game.scores[scoreType] = turnScore;
        totalScore += turnScore;
    }
    if (totalScore >= 63) {
        game.scores.bonus = 50;
        totalScore += 50;
    } else {
        game.scores.bonus = 0;
    }
    game.scores.total = totalScore;
    return game.scores.total;
}
