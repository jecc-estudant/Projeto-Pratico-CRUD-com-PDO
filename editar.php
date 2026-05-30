<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $sql = "UPDATE pessoas SET 
                    nome = :nome, cpf = :cpf, idade = :idade, email = :email, 
                    tipo = :tipo, curso = :curso, funcao = :funcao, 
                    salario = :salario, observacoes = :observacoes 
                WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome'        => $_POST['nome'],
            ':cpf'         => $_POST['cpf'],
            ':idade'       => $_POST['idade'],
            ':email'       => $_POST['email'],
            ':tipo'        => $_POST['tipo'],
            ':curso'       => empty($_POST['curso']) ? null : $_POST['curso'],
            ':funcao'      => empty($_POST['funcao']) ? null : $_POST['funcao'],
            ':salario'     => empty($_POST['salario']) ? null : $_POST['salario'],
            ':observacoes' => empty($_POST['observacoes']) ? null : $_POST['observacoes'],
            ':id'          => $_POST['id']
        ]);

        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        die("Erro ao atualizar: " . $e->getMessage());
    }
}

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM pessoas WHERE id = :id");
$stmt->execute([':id' => $id]);
$pessoa = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$pessoa) {
    die("Registro não encontrado no banco de dados.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cadastro - IFTO</title>
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <img src="assets/logo.png" alt="Logo IFTO" class="logo-img">
            </div>
            <p class="menu-title">OPÇÕES</p>
            <ul class="menu">
                <li><a href="index.php"><i class="fa-solid fa-arrow-left"></i> Voltar</a></li>
            </ul>
        </aside>

        <main class="main">
            <div class="topbar">
                <div><h1>Editar Cadastro</h1></div>
            </div>

            <section class="card">
                <h2 class="card-title">Atualizar Dados de <?php echo htmlspecialchars($pessoa['nome']); ?></h2>

                <form action="editar.php" method="POST">
                    
                    <input type="hidden" name="id" value="<?php echo $pessoa['id']; ?>">

                    <div class="form-grid">
                        <div class="form-group">
                            <label>Nome Completo</label>
                            <input type="text" name="nome" value="<?php echo htmlspecialchars($pessoa['nome']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" name="cpf" maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="<?php echo htmlspecialchars($pessoa['cpf']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Idade</label>
                            <input type="number" name="idade" value="<?php echo htmlspecialchars($pessoa['idade']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" value="<?php echo htmlspecialchars($pessoa['email']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tipo de Pessoa</label>
                            <select name="tipo" required>
                                <option value="Estudante" <?php echo ($pessoa['tipo'] == 'Estudante') ? 'selected' : ''; ?>>Estudante</option>
                                <option value="Professor" <?php echo ($pessoa['tipo'] == 'Professor') ? 'selected' : ''; ?>>Professor</option>
                                <option value="Servidor" <?php echo ($pessoa['tipo'] == 'Servidor') ? 'selected' : ''; ?>>Servidor</option>
                                <option value="Visitante" <?php echo ($pessoa['tipo'] == 'Visitante') ? 'selected' : ''; ?>>Visitante</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Curso</label>
                            <input type="text" name="curso" value="<?php echo htmlspecialchars($pessoa['curso']); ?>">
                        </div>
                        <div class="form-group">
                            <label>Função</label>
                            <input type="text" name="funcao" value="<?php echo htmlspecialchars($pessoa['funcao']); ?>">
                        </div>
                        <div class="form-group">
                            <label>Salário</label>
                            <input type="number" step="0.01" name="salario" value="<?php echo htmlspecialchars($pessoa['salario']); ?>">
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 25px;">
                        <label>Observações</label>
                        <textarea name="observacoes"><?php echo htmlspecialchars($pessoa['observacoes']); ?></textarea>
                    </div>

                    <div class="button-group">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Atualizar Dados</button>
                        <a href="index.php" class="btn btn-secondary" style="text-align: center; text-decoration: none;"><i class="fa-solid fa-xmark"></i> Cancelar</a>
                    </div>
                </form>
            </section>
        </main>
    </div>
</body>
</html>