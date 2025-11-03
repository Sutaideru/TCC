<?php
  include "protect.php";
  include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/bootstrap.css" rel="stylesheet">
    <script src="Bootstrap/bootstrap.js"></script> 
    <script src="scripts.js"></script>
    <link rel="icon" type="image/x-icon" href="./images/calendario.ico">
    <title>Agenda</title>
    <script src='js/index.global.min.js'></script>
    <link href="css/custom.css" rel="stylesheet">
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });
    </script>
    <style>
         body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
            min-height: 100vh;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div id="calendar" style="margin-top: 5vh;"></div>
</body>
</html>
