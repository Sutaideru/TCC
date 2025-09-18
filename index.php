<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.css" rel="stylesheet">
    <script src="bootstrap.js"></script> 
    <script src="scripts.js"></script>
    <style>
      body {
        background-image: url('./images/nome.png');
      }
      .caixa-exemplo {
        width: 30%;
        height: 100%;
        padding: 20px;
        background-color: white;
        margin-left: 35%;
        margin-top: 15%;
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
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3" style="width: 80%; margin-left: 10%">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check" style="margin-left: 45%">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
      <button type="submit" class="btn btn-primary" style="width: 20%; margin-left: 35%">Submit</button>
    <a href="prof_add.php">VaiSubmit</button>
    </a>
  </form>
</div>
</body>
</html>
