<?php

namespace App\Models;

class GameEngine {
    private $winConditions = [
        'carta' => ['sasso'],       // Carta batte sasso
        'sasso' => ['forbice'],     // Sasso batte forbice
        'forbice' => ['carta']      // Forbice batte carta
    ];
    
    public function play(Player $player1, Player $player2): GameResult {
        $move1 = $player1->makeMove();
        $move2 = $player2->makeMove();
        
        echo "\n{$player1->getName()}: $move1 vs {$player2->getName()}: $move2\n";
        
        if ($move1 === $move2) {
            return new GameResult($move1, $move2, null);
        }
        
        $winner = in_array($move2, $this->winConditions[$move1]) 
            ? $player1 
            : $player2;
        
        return new GameResult($move1, $move2, $winner);
    }
    
    // Metodo per estendere le condizioni di vittoria (utile per la variante Lizard-Spock)
    public function setWinConditions(array $conditions): void {
        $this->winConditions = $conditions;
    }
}