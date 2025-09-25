<?php
  include"protect.php";
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
    <meta>
</head>
<?php 
  echo $_SESSION['user'];
?>
<body>
<?php
include 'navbar.php'
?>
</ul>
    <table class="table table-bordered border-primary">
        <tr>
            <th>Dom</th>
            <th>Seg</th>
            <th>Ter</th>
            <th>Qua</th>
            <th>Qui</th>
            <th>Sex</th>
            <th>Sab</th>
        </tr>
        <tr>
            <td>a</td>
            <td>b</td>
            <td>c</td>
            <td>a</td>
            <td>b</td>
            <td>c</td>
            <td>a</td>
        </tr>
        <tr>
            <td>a</td>
            <td>b</td>
            <td>c</td>
            <td>a</td>
            <td>b</td>
            <td>c</td>
            <td>a</td>
        </tr>
        <tr>
            <td>a</td>
            <td>b</td>
            <td>c</td>
            <td>a</td>
            <td>b</td>
            <td>c</td>
            <td>a</td>
        </tr>
        <tr>
            <td>a</td>
            <td>b</td>
            <td>c</td>
            <td>a</td>
            <td>b</td>
            <td>c</td>
            <td>a</td>
        </tr>
    </table>

    <p>
      <a href="logout.php">Sair</a>
    </p>
</body>
</html>