<?php
$players = isset($_POST['players']) ? $_POST['players'] : [];
$numPlayers = count($players);

$results = []; 

function tournament($players) {
    $matches = [];
    $winners = [];
    
    for ($i = 0; $i < count($players); $i += 2) {
        if ($i + 1 < count($players)) {
            do {
                $score = rand(0, 2); // 0: loss for player 1, 1: draw, 2: win for player 1
                
                if ($score == 0) {
                    $matches[] = [$players[$i], $players[$i + 1], "0-1"];
                    $winners[] = $players[$i + 1]; // Player 2 wins
                } elseif ($score == 1) {
                    $matches[] = [$players[$i], $players[$i + 1], "1/2"];
                } else {
                    $matches[] = [$players[$i], $players[$i + 1], "1-0"];
                    $winners[] = $players[$i]; // Player 1 wins
                }
            } while ($score == 1); // Repeat until there's a winner
        } else {
            $winners[] = $players[$i];
        }
    }
    
    if (count($winners) > 1) {
        $nextMatches = tournament($winners);
        return array_merge($matches, $nextMatches);
    } else {
        return array_merge($matches, [["Final Winner", $winners[0], ""]]);
    }
}

$allMatches = tournament($players);
$finalWinner = end($allMatches)[1]; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess Game Simulator</title>
    <style> 
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
            margin: 0;
            text-align: center; 
            background-color: #ffffff; 
        }
        h1 {
            margin: 0;
            background-color: #7f7f7f; 
        }
        h2, form, footer {
            text-align: center;
        }
        input[type=submit] {
            background-color: #cccccc;
            border-radius: 6px; 
            font-size: 12px;
            cursor: pointer; 
        }
        input[type=submit]:hover {
            background-color: #b2b2b2; 
        }
        footer {
            margin-top: auto; 
        }
        table {
            margin: 0 auto; 
            border-collapse: collapse; 
            width: 40%; 
        }
        th, td {
            border: 1px solid black; 
            padding: 8px; 
        }
        td {
            text-align: center; 
        }
        th {
            text-align: center; 
        }
    </style>
</head>

<body>
    <h1>Chess Game Simulator</h1>
    <h2>Chess Tournament</h2>
    <form method="POST" action="page1.php">
        <label for="txtNumber">Number of Chess Players:</label>
        <input type="number" name="txtNumber" id="txtNumber" value="<?php echo $numPlayers; ?>" readonly>
        <br><br>
        
        <input type="hidden" name="players" value="<?php echo implode(',', $players); ?>">

        <table>
            <tr>
                <th>Match</th>
                <th>Player 1 Name</th>
                <th>Score</th> 
                <th>Player 2 Name</th> 
                <th>Result</th>
            </tr>
            <?php 
            foreach ($allMatches as $index => $match): 
                $player1 = $match[0];
                $player2 = $match[1];
                $score = $match[2];
                $result = "";

                if ($score == "1-0") {
                    $result = "$player1 wins"; // Player 1 wins
                } elseif ($score == "0-1") {
                    $result = "$player2 wins"; // Player 2 wins
                } elseif ($score == "1/2") {
                    $result = "Draw";
                }

                if ($player1 !== "Final Winner" && $player2 !== "Final Winner") {
                    ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo htmlspecialchars($player1); ?></td>
                        <td><?php echo $score; ?></td>
                        <td><?php echo htmlspecialchars($player2); ?></td>
                        <td><?php echo $result; ?></td>
                    </tr>
                    <?php
                }
            endforeach; ?>
        </table>
        <br>
        <h3>The Champion: <?php echo htmlspecialchars($finalWinner); ?></h3> 
        <input type="submit" value="New Tournament" />
    </form>
    <br>
    <footer>
         <p>© 2023 Özgün</p>
    </footer>
</body>
</html>
