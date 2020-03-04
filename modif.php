<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['modifier'])) {
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
        
        if ($prenom != "") {
            $requete = "UPDATE acces SET prenom = '$prenom' WHERE id=$id";
            $bdd->exec($requete);
        }
        
        if ($login != "") {
            $requete = "UPDATE acces SET login = '$login' WHERE id=$id";
            $bdd->exec($requete);
        }

        if ($pwd != "") {
            $requete = "UPDATE acces SET password = '$pwd' WHERE id=$id";
            $bdd->exec($requete);
        }

        if ($statut != "") {
            $requete = "UPDATE acces SET statut = '$statut' WHERE id=$id";
            $bdd->exec($requete);
        }

        if ($age != "") {
            $requete = "UPDATE acces SET age = '$age' WHERE id=$id";
            $bdd->exec($requete);
        }

        echo "<a href='liste.php'><p>Retourner à la liste</p></a>";
    }
}

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <title>Modifier</title>
</head>
<body>
<form name="identification" action="#" method="POST">
        <table>
            <h2>Modifier les valeurs</h2>
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
                <td align="left">
                    <select name="statut" size="1">
                        <option>Prof
                        <option>Admin
                        <option>Etudiant
                        <option>Apprenti
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right"><label for="age">Age</label></td>
                <td align="left"><input name="age" /></td>
            </tr>
            <tr>
                <td></td>
                <td align="left"><input type="submit" name="modifier" value="Modifier" /></td>
            </tr>
        </table>
        
    </form>
</body>
</html>