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
    </style>
    <script>
        function showPlayerInputs() {
            const numberOfPlayers = document.getElementById("txtNumber").value;
            const playerInputsContainer = document.getElementById("playerInputs");
            playerInputsContainer.innerHTML = ""; // Clear previous inputs

            for (let i = 1; i <= numberOfPlayers; i++) {
                playerInputsContainer.innerHTML += 
                    `<label for="player${i}">Player ${i} Name:</label>
                    <input type="text" name="players[]" id="player${i}" required>
                    <br><br>`;
            }
        }
    </script>
</head>
<body>
    <h1>Chess Game Simulator</h1>
    <h2>Chess Tournament</h2>
    <form method="POST" action="page2.php">
        <label for="txtNumber">Enter Number of Chess Players:</label>
        <input type="number" name="txtNumber" id="txtNumber" value="0" min="2" max="10" onchange="showPlayerInputs()" required>
        <br><br>
        <div id="playerInputs"></div>
        <input type="submit" value="Start" />
    </form>
    <br>
    <footer>
         <p>© 2023 Özgün</p>
    </footer>
</body>
</html>
