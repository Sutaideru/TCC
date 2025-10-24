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
    <meta>
    <style>
         body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
<?php
include 'navbar.php'
?>
</ul>
    <table class="table table-bordered border-primary" style="margin-top: 90px;">
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
</body>

</html>
