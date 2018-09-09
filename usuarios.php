<?php
require 'connect.php';

if(empty($_GET['id'])) {
    header('Location: index.php');
    exit;
} else {
    $id = $_GET['id'];
}

$sql = "SELECT * FROM pessoas WHERE id = :id";
$sql = $pdo->prepare($sql);
$sql->bindValue(":id", $id);
$sql->execute();

if($sql->rowCount() > 0){
    $sql = $sql->fetch();
    $nome = $sql['nome'];
    
}
?>
<h1>Olá <?php echo $nome; ?></h1>




