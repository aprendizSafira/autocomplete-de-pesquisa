<?php
require 'connect.php';

$array = array();

if(!empty($_POST['texto'])) {
    $texto = addslashes($_POST['texto']);
    
    //Consulta ao banco de dados
    $sql = "SELECT * FROM pessoas WHERE nome LIKE :texto";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":texto", '%'.$texto.'%');//% = acha o texto no começo, meio e no fim
    $sql->execute();
    
    //Verificando se houve algum resultado
    if($sql->rowCount() > 0) {
        //Se existe resultado, mostra na tela
        foreach($sql->fetchAll() as $pessoas) {
           $array[] = array(
               'nome'=>utf8_encode($pessoas['nome']),
               'id'=>$pessoas['id']
           );
        }
    }
}
echo json_encode($array);
