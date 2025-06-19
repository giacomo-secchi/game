<?php
require_once 'GameEngine.php';
require_once 'HumanPlayer.php';
require_once 'ComputerPlayer.php';
require_once 'GameResult.php';

function playGame(): void {
    echo "Scegli la modalità di gioco:\n";
    echo "1. Umano vs Computer\n";
    echo "2. Computer vs Computer\n";
    echo "Scelta: ";
    
    $handle = fopen("php://stdin", "r");
    $choice = trim(fgets($handle));
    
    $gameEngine = new GameEngine();
    
    if ($choice === '1') {
        $player1 = new HumanPlayer('Giocatore');
        $player2 = new ComputerPlayer('Computer');
    } else {
        $player1 = new ComputerPlayer('Computer 1');
        $player2 = new ComputerPlayer('Computer 2');
    }
    
    $result = $gameEngine->play($player1, $player2);
    
    if ($result->isDraw()) {
        echo "Risultato: Pareggio!\n";
    } else {
        echo "Vincitore: {$result->getWinner()->getName()}!\n";
    }
}

do {
    playGame();
    echo "\nVuoi giocare di nuovo? (s/n): ";
    $handle = fopen("php://stdin", "r");
    $playAgain = strtolower(trim(fgets($handle)));
} while ($playAgain === 's');

echo "Grazie per aver giocato!\n";