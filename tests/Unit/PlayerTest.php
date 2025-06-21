<?php
namespace Tests\Unit;

require_once __DIR__ . '/../../src/bootstrap.php';


use PHPUnit\Framework\TestCase;
use App\Models\HumanPlayer;
use App\Models\ComputerPlayer;

class PlayerTest extends TestCase

{
    /** @test */
    public function testHumanPlayerMove()
    {
        $player = new HumanPlayer('Test Player');
        $player->setMove('forbice');  // Simula input
        
        $this->assertSame('forbice', $player->makeMove());
    }

    /** @test */
    public function testComputerPlayerMove()
    {
        $player = new ComputerPlayer('AI');
        $validMoves = ['carta', 'forbice', 'sasso'];
        
        $move = $player->makeMove();
        $this->assertContains($move, $validMoves);
    }
}