<?php
require_once __DIR__ . '/../../src/bootstrap.php';

use App\Models\GameEngine;
use App\Models\HumanPlayer;
use App\Models\ComputerPlayer;

class GameTest extends PHPUnit\Framework\TestCase
{
    private $gameEngine;

    protected function setUp(): void
    {
        $this->gameEngine = new GameEngine();
    }

    /** @test */
    public function testWinGameLogic()
    {
        // Mock dei giocatori
        $player1 = $this->createMock(HumanPlayer::class);
        $player2 = $this->createMock(ComputerPlayer::class);

        // Scenario 1: Carta batte Sasso
        $player1->method('makeMove')->willReturn('carta');
        $player2->method('makeMove')->willReturn('sasso');
        $result = $this->gameEngine->play($player1, $player2);
        $this->assertSame($player1, $result->getWinner());

        // Scenario 2: Forbice batte Carta
        $player1->method('makeMove')->willReturn('forbice');
        $player2->method('makeMove')->willReturn('carta');
        $result = $this->gameEngine->play($player1, $player2);
        
        $this->assertSame($player1, $result->getWinner());
    }

    
    /** @test */
    public function testDrawGameLogic()
    {
        $player1 = $this->createMock(HumanPlayer::class);
        $player2 = $this->createMock(ComputerPlayer::class);

        $player1->method('makeMove')->willReturn('sasso');
        $player2->method('makeMove')->willReturn('sasso');

        $result = $this->gameEngine->play($player1, $player2);
        $this->assertTrue($result->isDraw());
    }
}





