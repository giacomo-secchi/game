<?php
namespace App; 

class GameResult {
    private $player1Move;
    private $player2Move;
    private $winner;
    
    public function __construct(string $player1Move, string $player2Move, ?Player $winner) {
        $this->player1Move = $player1Move;
        $this->player2Move = $player2Move;
        $this->winner = $winner;
    }
    
    public function getWinner(): ?Player {
        return $this->winner;
    }
    
    public function isDraw(): bool {
        return $this->winner === null;
    }
    
    public function getPlayer1Move(): string {
        return $this->player1Move;
    }
    
    public function getPlayer2Move(): string {
        return $this->player2Move;
    }
}