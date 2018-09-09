<?php
try {
    $pdo = new PDO("mysql:dbname=autocomplete_pesquisa;host=localhost", "root", "");
    
} catch (PDOException $e) {
    echo "Error: ".$e->getMessage();
    exit;
}

