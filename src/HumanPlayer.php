<?php
require_once 'Player.php';

class HumanPlayer extends BasePlayer {
    private $move;
    
    public function setMove(string $move): void {
        $this->move = strtolower(trim($move));
    }
    
    public function makeMove(): string {
        if (PHP_SAPI === 'cli') {
            // Comportamento originale per la console
            echo "Inserisci la tua mossa (carta, forbice, sasso): ";
            $handle = fopen("php://stdin", "r");
            $move = strtolower(trim(fgets($handle)));
            
            while (!in_array($move, ['carta', 'forbice', 'sasso'])) {
                echo "Mossa non valida. Riprova (carta, forbice, sasso): ";
                $move = strtolower(trim(fgets($handle)));
            }
            
            return $move;
        } else {
            // Comportamento per il web
            return $this->move;
        }
    }
}