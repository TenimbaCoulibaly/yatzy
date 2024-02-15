
class Dice {
    roll() {
        return Math.floor(Math.random() * 6) + 1; 
    }
}

function lDice(numDice) {
    const lanceur = [];
    const dice = new Dice();
    for (let i = 0; i < numDice; i++) {
        rolls.push(dice.roll());
    }
    return lanceur;
}

const dicels = lDice(3);
console.log("Résultats des dés lancés : " + dicels);

export default { Dice, lDice };
