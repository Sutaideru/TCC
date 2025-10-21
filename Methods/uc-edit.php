<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar UC</title>
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
                        <h4>Editar UC
                            <a href="uc_add.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php 
                        if (isset($_GET['IDcurso'])) {
                            $IDcurso = mysqli_real_escape_string($connection, $_GET['IDcurso']);
                            $sql = "SELECT * FROM cursos WHERE IDcurso = '$IDcurso'";
                            $query = mysqli_query($connection, $sql);
                        
                            if (mysqli_num_rows($query) > 0) {
                                $uc = mysqli_fetch_array($query);
                        ?>
                        <form action="acoes.php" method="POST">
                            <input type="hidden" name="uc_id" value="<?= $uc['IDcurso'] ?>">
                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome_curso" value="<?= $uc['nome_curso'] ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Turnos</label>
                                <input type="text" name="turnos_curso" value="<?= $uc['turnos_curso'] ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_uc" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                        <?php 
                            } else {
                                echo '<h5>UC não encontrada</h5>';
                            }
                        } else {
                            echo '<h5>Parâmetro ID não informado</h5>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
