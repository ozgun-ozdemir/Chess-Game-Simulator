<?php
$num = isset($_POST["txtNumber"]) ? intval($_POST["txtNumber"]) : 0;
$players = isset($_POST["players"]) ? $_POST["players"] : [];
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
            width: 30%; 
        }
        th, td {
            border: 1px solid black; 
            padding: 8px; 
        }
        td {
            text-align: center; 
        }
    </style>
</head>

<body>
    <h1>Chess Game Simulator</h1>
    <h2>Chess Tournament</h2>
    <form method="POST" action="page3.php">
        <label for="txtNumber">Number of Chess Players:</label>
        <input type="number" name="txtNumber" id="txtNumber" value="<?php echo $num; ?>" readonly>
        <br><br>
        
        <?php if ($num > 0 && count($players) > 0): ?>
        <table>
            <tr>
                <th colspan="2">Player Names</th> 
            </tr>
            <?php foreach ($players as $index => $player): ?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo htmlspecialchars($player); ?></td>
                <input type="hidden" name="players[]" value="<?php echo htmlspecialchars($player); ?>">
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <br>
        <input type="submit" value="Generate Tournament" />
    </form>
    <br>
    <footer>
         <p>© 2023 Özgün</p>
    </footer>
</body>
</html>
