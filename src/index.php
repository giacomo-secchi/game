<?php
require_once 'GameEngine.php';
require_once 'HumanPlayer.php';
require_once 'ComputerPlayer.php';
require_once 'GameResult.php';

// Configurazione
$moves = ['carta', 'forbice', 'sasso'];
$result = null;
$error = null;

// Elabora la mossa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mode = $_POST['mode'] ?? 'human_vs_computer';
    $humanMove = $_POST['move'] ?? '';
    
    try {
        // Umano vs Computer
        if ($mode === 'human_vs_computer') {
            if (empty($humanMove)) {
                throw new Exception("Seleziona una mossa!");
            }
            
            $player1 = new HumanPlayer('Tu');
            $player1->setMove($humanMove);
            $player2 = new ComputerPlayer('Computer');
        } 
        // Computer vs Computer
        else {
            $player1 = new ComputerPlayer('Computer 1');
            $player2 = new ComputerPlayer('Computer 2');
        }
        
        $game = new GameEngine();
        $result = $game->play($player1, $player2);
        
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta, Forbice e Sasso</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>🎮 Carta, Forbice e Sasso</h1>
    
    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    
    <?php if ($result): ?>
        <div class="result">
            <p>
                <?= htmlspecialchars($result->getPlayer1Move()) ?> 
                vs 
                <?= htmlspecialchars($result->getPlayer2Move()) ?>
            </p>
            <p class="winner">
                <?php if ($result->isDraw()): ?>
                    🟰 Pareggio!
                <?php else: ?>
                    🏆 Vince <?= htmlspecialchars($result->getWinner()->getName()) ?>!
                <?php endif; ?>
            </p>
        </div>
    <?php endif; ?>
    
    <div class="controls">
        <form method="post">
            <input type="hidden" name="mode" value="human_vs_computer">
            
            <h3>Seleziona la tua mossa:</h3>
            <div>
                <button type="submit" name="move" value="carta" class="move">✋ Carta</button>
                <button type="submit" name="move" value="forbice" class="move">✌️ Forbice</button>
                <button type="submit" name="move" value="sasso" class="move">✊ Sasso</button>
            </div>
        </form>
        
        <form method="post" style="margin-top: 20px;">
            <input type="hidden" name="mode" value="computer_vs_computer">
            <button type="submit" id="computer-only-btn" class="move">
                🖥️ Computer vs Computer
            </button>
        </form>
    </div>
</body>
</html>