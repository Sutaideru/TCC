<?php
include "protect.php";
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
  <script src='js/pt-br.global.min.js'></script>
  <script src='js/custom.js'></script>
  <link href="css/custom.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
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
  <?php include 'navbar.php'; ?>
  <div id="calendar" style="margin-top: 2vh;"></div>
</body>

</html>