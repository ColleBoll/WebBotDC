document.addEventListener('DOMContentLoaded', () => {
    const startButton = document.getElementById('startButton');
    const stopButton = document.getElementById('stopButton');
    const consoleOutput = document.getElementById('consoleOutput');
  
    startButton.addEventListener('click', () => {
      fetch('/start')
        .then(response => response.text())
        .then(message => console.log(message));
    });
  
    stopButton.addEventListener('click', () => {
      fetch('/stop')
        .then(response => response.text())
        .then(message => console.log(message));
    });
  
    // Use WebSockets or SSE to display console output in real-time
    const socket = new WebSocket('ws://your-backend-url/console');
  
    socket.addEventListener('message', event => {
      const message = event.data;
      consoleOutput.textContent += message + '\n';
    });
  });
  