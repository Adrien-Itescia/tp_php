<?php

if (isset($_POST['username']) and isset($_POST['password'])) {
$bdd = new PDO('mysql:host=localhost;dbname=tp_pdo;charset=utf8', 'root', '');
$login = $_POST['username'];
$password = $_POST['password'];


    $requete = "SELECT * FROM acces WHERE login = :login AND password = :password";
    $resultat = $bdd->prepare($requete);
    $resultat->execute(
        array(
            'login' => $login,
            'password' => $password
        )
    );

    $test = $resultat->rowCount();
    if ($test > 0) {
        Header( 'Location: login.php?message=1');
    } else {
        Header( 'Location: login.php?message=0');
    }
}
?>
