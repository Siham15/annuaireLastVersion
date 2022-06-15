<?php
// On inclut la connexion à la base
require_once('connect.php');

$sql = 'SELECT * FROM `contact` WHERE `id`=:id';

// On prépare la requête
$query = $db->prepare($sql);

// On attache les valeurs
$query->bindValue(':id', PDO::PARAM_INT);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$contact = $query->fetch();
session_start();



if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    // On écrit notre requête
    $sql = 'SELECT * FROM `contact` WHERE `id`=:id';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On attache les valeurs
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On stocke le résultat dans un tableau associatif
    $contact = $query->fetch();
    if(!$contact){
        header('Location: contact_list.php');
    }
}else{
    header('Location: contact_list.php');
}

?>
  

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Liste des contacts</title>

</head>
<body>

<a href="contact_list.php" class="btn btn-primary">Accueil</a>
    <h1>Détails du contact</h1>
    <p>ID : <?= $contact['id'] ?></p>
    <p>Nom : <?= $contact['nom'] ?></p>
    <p>Prénom : <?= $contact['prenom'] ?></p>
   <p>Email : <?= $contact['mail'] ?></p>
    <p><a href="contact_edit.php?id=<?= $contact['id'] ?>">Modifier</a>  <a href="contact_remove.php?id=<?= $contact['id'] ?>">Supprimer</a></p>
    <?php include('phone_list.php'); ?>
    <?php include('adress_list.php'); ?>
</body>
</html>