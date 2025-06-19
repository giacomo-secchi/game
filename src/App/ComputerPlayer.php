<?php
namespace App; 

class ComputerPlayer extends BasePlayer {
    public function makeMove(): string {
        $moves = ['carta', 'forbice', 'sasso'];
        $move = $moves[array_rand($moves)];
        echo "Il computer {$this->name} ha scelto: $move\n";
        return $move;
    }
}