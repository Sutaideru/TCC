<?php
include ("conexao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Bootstrap/bootstrap.css" rel="stylesheet">
    <script src="Bootstrap/bootstrap.js"></script> 
    <script src="scripts.js"></script>
    <style>
      body {
        background-image: url('./images/nome.png');
        width: fit-content;
        length: fit-content;
        
      }
      .caixa-exemplo {
        margin: 0 auto;
        width: 200px;
        height: 60%;
        padding: 20px;
        background-color: white;
        margin-left: auto;
        margin-top: auto;
        border-radius: 15px;
        justify-content: center;
      }
    </style>
    <link rel="icon" type="image/x-icon" href="./images/calendario.ico">
    <title>Agenda</title>
</head>
<body>
<div class="caixa-exemplo">
  <form action="register_db.php" method="POST">
    <div class="mb-3" style="width: 80%; margin-left: 10%">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3" style="width: 80%; margin-left: 10%">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
      <button type="submit" class="btn btn-primary" style="width: 20%; margin-left: 35%">Submit</button>
    <a href="home.php">VaiSubmit</button>
    </a>
  </form>
</div>
</body>
</html>
