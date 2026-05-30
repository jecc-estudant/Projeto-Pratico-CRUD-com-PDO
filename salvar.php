<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        $nomeFotoSalvar = 'default.png';

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            $arquivoTmp  = $_FILES['foto']['tmp_name'];
            $nomeOriginal = $_FILES['foto']['name'];
            
            $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

            if ($extensao === 'png') {

                if (!is_dir('uploads')) {
                    mkdir('uploads', 0777, true);
                }

                $nomeFotoSalvar = md5(uniqid(rand(), true)) . '.png';
                $destino = 'uploads/' . $nomeFotoSalvar;

                if (!move_uploaded_file($arquivoTmp, $destino)) {
                    $nomeFotoSalvar = 'default.png'; 
                }
            } else {
                echo "<script>alert('Apenas arquivos no formato PNG são permitidos.'); window.location.href='index.php';</script>";
                exit;
            }
        }

        $sql = "INSERT INTO pessoas (nome, cpf, idade, email, foto, tipo, curso, funcao, salario, observacoes) 
                VALUES (:nome, :cpf, :idade, :email, :foto, :tipo, :curso, :funcao, :salario, :observacoes)";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            ':nome'        => $_POST['nome'],
            ':cpf'         => $_POST['cpf'],
            ':idade'       => $_POST['idade'],
            ':email'       => $_POST['email'],
            ':foto'        => $nomeFotoSalvar,
            ':tipo'        => $_POST['tipo'],
            ':curso'       => empty($_POST['curso']) ? null : $_POST['curso'],
            ':funcao'      => empty($_POST['funcao']) ? null : $_POST['funcao'],
            ':salario'     => empty($_POST['salario']) ? null : $_POST['salario'],
            ':observacoes' => empty($_POST['observacoes']) ? null : $_POST['observacoes']
        ]);

        header("Location: index.php");
        exit;

    } catch (PDOException $e) {
        echo "Erro ao salvar no banco de dados: " . $e->getMessage();
    }
} else {
    header("Location: index.php");
    exit;
}
?>