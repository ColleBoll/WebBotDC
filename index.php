<!DOCTYPE html>
<html>
<head>
  <title>Discord Bot Manager</title>
</head>
<body>
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