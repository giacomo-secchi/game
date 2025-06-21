<?php
namespace Tests\Unit;


use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use App\Models\HumanPlayer;
use App\Models\ComputerPlayer;

#[CoversClass(PlayerTest::class)]
class PlayerTest extends TestCase
{
    #[CoversMethod(GameResult::class, '__construct')]
    #[CoversMethod(GameResult::class, 'makeMove')]
    public function testHumanPlayerMove()
    {
        $player = new HumanPlayer('Test Player');
        $player->setMove('forbice');  // Simula input
        
        $this->assertSame('forbice', $player->makeMove());
    }

    
    #[CoversMethod(GameResult::class, '__construct')]
    #[CoversMethod(GameResult::class, 'makeMove')]
    public function testComputerPlayerMove()
    {
        $player = new ComputerPlayer('AI');
        $validMoves = ['carta', 'forbice', 'sasso'];
        
        $move = $player->makeMove();
        $this->assertContains($move, $validMoves);
    }
}