<?php
namespace App\Models;

class ComputerPlayer extends BasePlayer {
    public function makeMove(): string {
        $moves = ['carta', 'forbice', 'sasso'];
        $move = $moves[array_rand($moves)];

        return $move;
    }
}