<?php
namespace Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use App\Models\GameResult;
use App\Models\HumanPlayer;

#[CoversClass(GameResult::class)]
class GameResultTest extends TestCase
{
    #[CoversMethod(GameResult::class, '__construct')]
    #[CoversMethod(GameResult::class, 'getPlayer1Move')]
    #[CoversMethod(GameResult::class, 'getPlayer2Move')]
    #[CoversMethod(GameResult::class, 'getWinner')]
    public function testGameMoves()
    {
        $player = new HumanPlayer('Test');
        $result = new GameResult('carta', 'sasso', $player);
        
        $this->assertSame('carta', $result->getPlayer1Move());
        $this->assertSame('sasso', $result->getPlayer2Move());
        $this->assertSame($player, $result->getWinner());
    }
}