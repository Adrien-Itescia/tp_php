<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
$bdd = new PDO('mysql:host=localhost;dbname=tp_pdo;charset=utf8', 'root', '');

try {    
    $requete = "DELETE FROM acces WHERE id=$id";
    $bdd->exec($requete);
    Header( 'Location: liste.php?suppression=1');

} catch(PDOException $except) {
    Header( 'Location: liste.php?suppression=0');
}
}
?>