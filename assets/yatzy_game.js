class YatzyGame {
    constructor() {
        this.players = [];
        this.currentPlayer = null;
        this.dice = [];
        this.round = 0;
        this.maxRounds = 13;
        this.isGameOver = false;
        this.turn = {
            roll: 0,
            diceValues: [],
            diceState: []
        };
    }
    addPlayer(player) {
        this.players.push(player);
    }
    start() {
        if (this.players.length < 2) {
            console.log("Le jeu nécessite au moins 2 joueurs.");
            return;
        }
        this.currentPlayer = this.players[0];
        this.round = 1;
        this.isGameOver = false;
        console.log("Le jeu commence!");
        console.log("C'est au tour de:", this.currentPlayer);
    }
    nextPlayer() {
        const currentPlayerIndex = this.players.indexOf(this.currentPlayer);
        const nextPlayerIndex = (currentPlayerIndex + 1) % this.players.length;
        this.currentPlayer = this.players[nextPlayerIndex];
        console.log("C'est au tour de:", this.currentPlayer);
    }

    lDice() {
        if (this.isGameOver) {
            console.log("Le jeu est terminé. Une autre partie?");
            return;
        }

        this.dice = [];

        for (let i = 0; i < 5; i++) {
            const diceValue = Math.floor(Math.random() * 6) + 1;
            this.dice.push(diceValue);
        }

        this.turn.roll++;
        this.turn.diceValues = this.dice;
        this.turn.diceState = Array(5).fill(true);

        console.log("Les dés ont été lancés :", this.dice);
    }

    end() {
        if (this.isGameOver) {
            console.log("Le jeu est terminé. Une autre partie?");
            return;
        }

        if (this.round >= this.maxRounds) {
            this.isGameOver = true;
            console.log("Le jeu est terminé !");
            return;
        }

        this.round++;
        this.nextPlayer();
        this.lDice();
    }
}
const game = new YatzyGame();
game.addPlayer("Joueur 1");
game.addPlayer("Joueur 2");
game.start();
game.lDice();
game.end();






