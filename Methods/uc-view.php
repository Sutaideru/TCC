<?php
  include "protect.php";
  include "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="Bootstrap/bootstrap.css" rel="stylesheet">
  <script src="Bootstrap/bootstrap.js"></script> 
  <link rel="icon" type="image/x-icon" href="./images/calendario.ico">
  <title>Visualição de Unidade Curricular</title>

  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

 
    nav {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
    }

  
    .main-content {
      margin-top: 90px;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
    }


    .card-form {
      background-color: #0d6efd;
      border-radius: 20px;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
      padding: 40px 50px;
      width: 100%;
      max-width: 600px;
      color: white;
      margin-bottom: 40px;
    }

    .card-form h2 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: bold;
    }

    .form-label {
      font-weight: 600;
    }

    .form-control, .form-select {
      border-radius: 10px;
      border: none;
      padding: 10px;
    }

    .form-control:focus, .form-select:focus {
      box-shadow: 0 0 0 0.2rem rgba(255,255,255,0.4);
    }

    .btn-light {
      width: 100%;
      border-radius: 10px;
      font-size: 1.1rem;
      font-weight: 500;
      background-color: #ffffff;
      color: #0d6efd;
      border: none;
      transition: 0.3s;
    }

    .btn-light:hover {
      background-color: #e9ecef;
      transform: scale(1.02);
    }

   
    .table-container {
      width: 90%;
      max-width: 900px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 3px 15px rgba(0,0,0,0.1);
      padding: 20px;
    }

    .table th {
      background-color: #0d6efd;
      color: white;
      text-align: center;
    }

    .table td {
      text-align: center;
      vertical-align: middle;
    }

    h5 {
      text-align: center;
      color: #6c757d;
    }
  </style>
</head>
<body>
    <div class="card-body">
        <?php
            if (isset($_GET['id'])) {
                $matricula = real_escape_string($connection, $_GET['id']);
                $sql = "SELECT * FROM professores WHERE id = 'matricula'";
                $query = mysqli_query($connection, $sql);

                if (mysqli_num_rows($query) > 0){
                    $professor = mysqli_fetch_array($query);
                }
            
        ?>
        <div class="mb-3">
            <label></label>
            <p class="form-control">
                <?= $usuario['matricula']; ?>
            </p>
        </div>
        <div class="mb-3">
            <label></label>
            <p class="form-control">
                <?= $usuario['nome']; ?>
            </p>
        </div>
        <div class="mb-3">
            <label></label>
            <p class="form-control">
                <?= $usuario['turnos']; ?>
            </p>
        </div>
        <div class="mb-3">
            <label></label>
            <p class="form-control">
                <?= $usuario['']; ?>
            </p>
        </div>
        <?php
            } else {
                echo "<h5>Unidade Curricular não encontrada</h5>";
            };
        ?>
    </div>
</body>
</html>