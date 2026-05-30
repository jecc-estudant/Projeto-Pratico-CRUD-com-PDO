<?php
require_once 'conexao.php';

if (isset($_GET['id'])) {
    try {
        $id = $_GET['id'];
        
        $sql = "DELETE FROM pessoas WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([':id' => $id]);

        header("Location: index.php");
        exit;

    } catch (PDOException $e) {
        echo "Erro ao excluir o registro: " . $e->getMessage();
    }
} else {
    header("Location: index.php");
    exit;
}
?>