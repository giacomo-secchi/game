<?php
namespace Tests\Unit;


require_once __DIR__ . '/../../src/bootstrap.php';

use PHPUnit\Framework\TestCase;
use App\Models\GameEngine;
use App\Models\HumanPlayer;
use App\Models\ComputerPlayer;
use App\Models\GameResult;

class GameResultTest extends TestCase
{
 

   /** @test */
    public function testGameMoves()
    {
        $player = new HumanPlayer('Test');
        $result = new GameResult('carta', 'sasso', $player);
        
        $this->assertSame('carta', $result->getPlayer1Move());
        $this->assertSame('sasso', $result->getPlayer2Move());
        $this->assertSame($player, $result->getWinner());
    }
    

}





