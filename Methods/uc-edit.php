<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Unidade Curricular</title>
    <style>
        body {
            background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
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
                        if (isset($_GET['IDuc'])) {
                            $IDuc = mysqli_real_escape_string($connection, $_GET['IDuc']);
                            $sql = "SELECT * FROM unidadescurriculares WHERE IDuc = '$IDuc'";
                            $query = mysqli_query($connection, $sql);
                        
                            if (mysqli_num_rows($query) > 0) {
                                $uc = mysqli_fetch_array($query);
                        ?>
                        <form action="acoes.php" method="POST">
                            <input type="hidden" name="uc_id" value="<?= $uc['IDuc'] ?>">

                            <div class="mb-3">
                                <label>Nome da UC</label>
                                <input type="text" name="nome_uc" value="<?= $uc['nome_uc'] ?>" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <label>Turnos</label>
                                <input type="text" name="turnos_uc" value="<?= $uc['turnos_uc'] ?>" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <label>Carga Horária Total</label>
                                <input type="number" name="carga_horaria_total_uc" value="<?= $uc['carga_horaria_total_uc'] ?>" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <label>Carga Horária por Dia</label>
                                <input type="number" name="carga_horaria_dia_uc" value="<?= $uc['carga_horaria_dia_uc'] ?>" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <label>Sigla da UC</label>
                                <input type="text" name="sigla_uc" value="<?= $uc['sigla_uc'] ?>" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <label>Curso / Módulo</label>
                                <input type="text" name="curso_modulo_uc" value="<?= $uc['curso_modulo_uc'] ?>" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <label>Local</label>
                                <input type="text" name="local" value="<?= $uc['local'] ?>" class="form-control" />
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
