<table border=1>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=tp_pdo;charset=utf8', 'root', '');


echo "<a href='ajoute.php'><img src='images/ajoute.png' /></a><br /><br />";


foreach($bdd->query('SELECT * FROM acces') as $row) {
    $id = $row['id'];
    echo $row['prenom'] . " " . $row['login'] . " " . $row['statut'] . " " . $row['age'] . " " . "<a href='efface.php?id=$id'><img src=images/croix.png /></a>" . " " . "<a href='modif.php?id=$id'><img src=images/modif.png /></a>"  . "<br />";
}
echo "<br />";


if (isset($_GET['suppression']) && $_GET['suppression'] == 1) {
    echo "Suppression reussie";

} elseif (isset($_GET['suppression']) && $_GET['suppression'] == 0){
    echo "Suppression echouee";
}

?>
</table>