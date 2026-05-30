<?php
$host    = 'localhost';        
$dbname  = 'bd_cadastro_ifto';
$usuario = 'root';             
$senha   = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

} catch (PDOException $e) {
    die("Erro crítico de conexão com o banco de dados: " . $e->getMessage());
}
?>