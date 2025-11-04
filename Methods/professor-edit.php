<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Professor</title>
    <style>
        body {
            background-color: linear-gradient(135deg, #f0f4f8, #d9e2ec);
        }
    </style>
    <?php 
        include 'navbar.php'; 
        include 'conexao.php'; 
    ?>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Professor
                            <a href="prof_add.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <form action="acoes.php" method="POST">
                    <div class="card-body">
                        <?php 
                        if (isset($_GET['matricula'])) {
                            $matricula = mysqli_real_escape_string($connection, $_GET['matricula']);
                            $sql = "SELECT * FROM professores WHERE matricula = '$matricula'";
                            $query = mysqli_query($connection, $sql);
                        
                            if (mysqli_num_rows($query) > 0) {
                                $usuario = mysqli_fetch_array($query);
                        ?>

                            <input type="hidden" name="usuario_id" value="<?= $usuario['matricula'] ?>">
                            <div class="mb-3">
                                <label>Matricula</label>
                                <input type="number" name="matricula" value="<?= $usuario['matricula'] ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome_professor" value="<?= $usuario['nome_professor'] ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Turnos</label>
                                <input type="text" name="turnos_professor" value="<?= $usuario['turnos_professor'] ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_usuario" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                        <?php 
                            } else {
                                echo '<h5>Usuário não encontrado</h5>';
                            }
                        } else {
                            echo '<h5>Parâmetro matricula não informado</h5>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
