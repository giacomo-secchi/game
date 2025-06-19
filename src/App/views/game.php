<h1>🎮 Carta, Forbice e Sasso</h1>
    
<?php if ($error): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>
    


<?php if (isset($result)): ?>
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
        <button type="submit" id="computer-only-btn" class="move computer-btn">
            🖥️ Computer vs  Computer 🖥️
        </button>
    </form>
</div>







