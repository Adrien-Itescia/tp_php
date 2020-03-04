<?php
if (isset($_POST['ajouter'])) {
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $pwd = $_POST['pwd'];
    $statut = $_POST['statut'];
    $age = $_POST['age'];

    $bdd = new PDO('mysql:host=localhost;dbname=tp_pdo;charset=utf8', 'root', '');

    try {
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully <br />";

        } catch(PDOException $except) {
        echo "Connection failed <br />" . $except->getMessage();
        }
    
    try {    
        $requete = "INSERT INTO acces (prenom, login, password, statut, age)
                    VALUES ('$prenom', '$login', '$pwd', '$statut', $age)";
        $bdd->exec($requete);
        echo "Ajout effectué";

    } catch(PDOException $except) {
        echo $requete;
        echo "Erreur, veuillez remplir correctement toutes les cases";
    }
    echo "<a href='liste.php'><p>Retour à la liste</p></a>";
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <title>Ajoute</title>
</head>
<body>
<form name="identification" action="#" method="POST">
        <table>
            <h2>Ajouter un utilisateur</h2>
            <tr>
                <td align="right"><label for="prenom">Prenom</label></td>
                <td align="left"><input type="text" name="prenom" /></td>
            </tr>
            <tr>
                <td align="right"><label for="login">Login</label></td>
                <td align="left"><input name="login" /></td>
            </tr>
            <tr>
                <td align="right"><label for="pwd">Password</label></td>
                <td align="left"><input type="password" name="pwd" /></td>
            </tr>
            <tr>
                <td align="right"><label for="statut">Statut</label></td>
                <td align="left"><input name="statut" /></td>
            </tr>
            <tr>
                <td align="right"><label for="age">Age</label></td>
                <td align="left"><input name="age" /></td>
            </tr>
            <tr>
                <td></td>
                <td align="left"><input type="submit" name="ajouter" value="Ajouter" /></td>
            </tr>
        </table>
        
    </form>
</body>
</html>