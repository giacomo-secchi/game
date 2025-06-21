<?php
namespace App\Controllers;

use App\Models\GameEngine;
use App\Models\HumanPlayer;
use App\Models\ComputerPlayer;

class GameController
{
    public function play()
    {
        $result = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mode = $_POST['mode'] ?? 'human_vs_computer';
            $humanMove = $_POST['move'] ?? '';
            
            try {
                $gameEngine = new GameEngine();
                
                if ($mode === 'human_vs_computer') {
                    if (empty($humanMove)) {
                        throw new \Exception("Seleziona una mossa!");
                    }
                    
                    $player1 = new HumanPlayer('Tu');
                    $player1->setMove($humanMove);
                    $player2 = new ComputerPlayer('Computer');
                } else {
                    $player1 = new ComputerPlayer('Computer 1');
                    $player2 = new ComputerPlayer('Computer 2');
                }
                
                $result = $gameEngine->play($player1, $player2);

                $output = sprintf(
                    "\n%s: %s vs %s: %s\n",
                    $player1->getName(),
                    $result->getPlayer1Move(),
                    $player2->getName(),
                    $result->getPlayer2Move()
                );
                
                echo $output; 
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }

        // Carica la vista
        require APP_PATH . '/views/layout.php';
    }
}