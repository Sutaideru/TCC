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
        background-image: url('');
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
<meta>
</head>
<body>
<ul class="nav" style = "background-color: #005caa;">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="home.php" style="color:white;">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="novo_prof.php" style="color:white;">Novo Prof</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="prof_add.php" style="color:white;">Prof Add</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php" style="color:white;">Index</a>
  </li>
</ul>
<form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="text" class="form-control" id="exampleInputPassword1">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>