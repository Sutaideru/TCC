<?php
session_start();
include "protect.php"; 
include "conexao.php";
include "navbar.php";

$usuario_nome = $_SESSION['user'] ?? null;
if (!$usuario_nome) {
    die("Usuário não autenticado.");
}

$msg = '';
$msg_tipo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova_senha = $_POST['nova_senha'] ?? '';
    $confirmar_senha = $_POST['confirmar_senha'] ?? '';

    if (empty($nova_senha) || empty($confirmar_senha)) {
        $msg = "Preencha todos os campos.";
        $msg_tipo = 'error';
    } elseif ($nova_senha !== $confirmar_senha) {
        $msg = "As senhas não coincidem.";
        $msg_tipo = 'error';
    } elseif (strlen($nova_senha) < 8) {
        $msg = "A senha deve ter pelo menos 8 caracteres.";
        $msg_tipo = 'error';
    } elseif (!preg_match('/[A-Z]/', $nova_senha)) {
        $msg = "A senha deve conter pelo menos uma letra maiúscula.";
        $msg_tipo = 'error';
    } elseif (!preg_match('/[a-z]/', $nova_senha)) {
        $msg = "A senha deve conter pelo menos uma letra minúscula.";
        $msg_tipo = 'error';
    } elseif (!preg_match('/[0-9]/', $nova_senha)) {
        $msg = "A senha deve conter pelo menos um número.";
        $msg_tipo = 'error';
    } elseif (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $nova_senha)) {
        $msg = "A senha deve conter pelo menos um caractere especial (!@#$%^&*(),.?\":{}|<>).";
        $msg_tipo = 'error';
    } else {
        $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET senha = ? WHERE usuario = ?";
        $stmt = $connection->prepare($sql);
        if (!$stmt) {
            die("Erro na preparação da query: " . $connection->error);
        }
        $stmt->bind_param("ss", $senha_hash, $usuario_nome);

        if ($stmt->execute()) {
            $msg = "Senha alterada com sucesso!";
            $msg_tipo = 'success';
        } else {
            $msg = "Erro ao alterar senha: " . $stmt->error;
            $msg_tipo = 'error';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="Bootstrap/bootstrap.css" rel="stylesheet" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css'>
    <script src="Bootstrap/bootstrap.js"></script>
    <script src="scripts.js"></script>
    <title>Alterar Senha</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
            min-height: 100vh; display: flex; flex-direction: column;
        }
        main.content-wrapper {
            flex: 1; display: flex; justify-content: center; align-items: center; padding: 1rem;
        }
        .caixa-exemplo {
            width: 90%; max-width: 400px; padding: 2rem 1.5rem;
            background-color: #fff; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            display: flex; flex-direction: column; align-items: center; border: none; min-height: 350px;
        }
        .caixa-exemplo h4 {
            color: #005caa; margin-bottom: 1.5rem; font-weight: 600; text-align: center;
        }
        small.text-muted {
            color: #6c757d; font-size: 0.85rem;
        }
        .mt-4 {
            width: 100%; margin-top: 1.5rem; display: flex; justify-content: space-between;
        }

        .input-container {
            position: relative;
            width: 100%;
        }

        .input-container input {
            width: 100%;
            padding-right: 40px;
        }

        .input-container button {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            cursor: pointer;
            color: #555;
            z-index: 1;
        }
    </style>
</head>
<body>

<main class="content-wrapper">
    <div class="caixa-exemplo">
        <h4 class="mb-3">Alterar Senha</h4>

        <form method="POST" action="" onsubmit="return validarSenha()">
            <div class="mb-3">
                <label for="nova_senha" class="form-label">Nova Senha:</label>
                <div class="input-container">
                    <input type="password" class="form-control" id="nova_senha" name="nova_senha" required minlength="8" style="width: 350px" />
                    <small class="text-muted">Mínimo de 8 caracteres, com maiúscula, minúscula, número e caractere especial</small>
                    <button type="button" id="btn-senha-nova" onclick="mostrarNovaSenha()">
                        <i class="bi bi-eye-fill"></i>
                    </button>
                </div>
            </div>
            <div class="mb-3">
                <label for="confirmar_senha" class="form-label">Confirmar Nova Senha:</label>
                <div class="input-container">
                    <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" required minlength="8" />
                    <button type="button" id="btn-senha-confirmar" onclick="mostrarConfirmarSenha()">
                        <i class="bi bi-eye-fill"></i>
                    </button>
                </div>
            </div>
            <div class="mt-4">
                <a href="conta.php" class="btn btn-primary me-2" style="margin-right:10px">Voltar</a>
                <button type="submit" class="btn btn-warning" style="margin-right: 10px">Alterar Senha</button>
                <a href="logout.php" class="btn btn-danger" style="margin-right:10px">Sair</a>
            </div>
        </form>
    </div>
</main>

<script>
function validarSenha() {
    var senha = document.getElementById('nova_senha').value;
    var confirmar = document.getElementById('confirmar_senha').value;

    if (senha !== confirmar) {
        alert('As senhas devem ser iguais!');
        return false;
    }

    if (senha.length < 8) {
        alert('A senha deve ter pelo menos 8 caracteres!');
        return false;
    }

    if (!/[A-Z]/.test(senha)) {
        alert('A senha deve conter pelo menos uma letra maiúscula!');
        return false;
    }

    if (!/[a-z]/.test(senha)) {
        alert('A senha deve conter pelo menos uma letra minúscula!');
        return false;
    }

    if (!/[0-9]/.test(senha)) {
        alert('A senha deve conter pelo menos um número!');
        return false;
    }

    if (!/[!@#$%^&*(),.?":{}|<>]/.test(senha)) {
        alert('A senha deve conter pelo menos um caractere especial (!@#$%^&*(),.?":{}|<>)!');
        return false;
    }

    return true;
}

<?php if ($msg): ?>
    window.addEventListener('DOMContentLoaded', function() {
        alert('<?php echo addslashes($msg); ?>');
        <?php if ($msg_tipo === 'success'): ?>
            window.location.href = 'conta.php';
        <?php endif; ?>
    });
<?php endif; ?>
</script>

</body>
</html>
