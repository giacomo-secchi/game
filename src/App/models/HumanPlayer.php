<?php
 
namespace App\Models;
use App\Models\BasePlayer;

class HumanPlayer extends BasePlayer {
    private $move;
    
     private $environment; 



    public function setMove(string $move): void {
        $this->move = strtolower(trim($move));
    }
    
    public function makeMove(): string {
            
         

        if ($this->environment === 'test' || $this->move !== null) {
            return $this->move; // Comportamento per test
        }
        
        if ($this->environment === 'cli') {
           
            // Comportamento originale per la console
            echo "Inserisci la tua mossa (carta, forbice, sasso): ";
            $handle = fopen("php://stdin", "r");
            $move = strtolower(trim(fgets($handle)));
            
            while (!in_array($move, ['carta', 'forbice', 'sasso'])) {
                echo "Mossa non valida. Riprova (carta, forbice, sasso): ";
                $move = strtolower(trim(fgets($handle)));
            }
        }
        
        return $this->move; // Comportamento per web
    }
}