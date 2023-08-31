<!DOCTYPE html>
<html>
<head>
  <title>Discord Bot Manager</title>
</head>
<body>

  <form action="actions/changetoken.inc.php" method="POST">
    <label for="token">Token:</label>
    <input type="text" name="token" id="token" required>
    <button type="submit">Update Token</button>
  </form>

  <form action="actions/changestatus.inc.php" method="POST">
    <label for="status">Status:</label>
    <input type="text" name="status" id="status" placeholder="<?php
      $json_object = file_get_contents('botData/config.json'); 
      $jsonObj = json_decode($json_object, true);
      $key = "status";
      $status = $jsonObj[0][$key];
      echo($status);
    ?>" required>
    <button type="submit">Update Status</button>
  </form>

  <form action="botStart.php">
    <button id="startButton">Start Bot</button>
  </form>
  <form action="stopBot.php">
    <button id="stopButton">Stop Bot</button>
  </form>
  <pre id="consoleOutput"></pre>
  
  <script>
    const startButton = document.getElementById('startButton');
    const stopButton = document.getElementById('stopButton');
    const consoleOutput = document.getElementById('consoleOutput');

    startButton.addEventListener('click', () => {
      header('Location: botStart.php');
    });

    stopButton.addEventListener('click', () => {
      header('Location: stopBot.php');
    });
  </script>
</body>
</html>