<?php
require_once('connect.php');
if(isset($_POST)){
    if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['prenom']) && !empty($_POST['prenom'])){
        $id = strip_tags($_GET['id']);
        $nom = strip_tags($_POST['nom']);
        $prenom = strip_tags($_POST['prenom']);
        $mail = strip_tags($_POST['mail']);
       

        $sql = "UPDATE `contact` SET `nom`=:nom, `prenom`=:prenom, mail = :mail WHERE `id`=:id;";

        $query = $db->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
       

        $query->execute();
    

        header('Location: contact_list.php');
    }
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `contact` WHERE `id`=:id;";

    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des contacts</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h1>Modifier un contact</h1>
    <form method="post">
        <p>
            <label for="id">#</label>
            <input type="number" name="id" id="id" value="<?= $result['id'] ?>">
        </p>
        <p>
            <label for="nom"> Nom </label>
            <input type="text" name="nom" id="nom" value="<?=$result['nom'] ?>">
        </p>
        <p> <label for="prenom"> Prénom </label>
            <input for="text" name="prenom" id="prenom" value="<?=$result['prenom'] ?>">
        </p>
        <p> <label for="mail"> E-mail </label>
            <input for="text" name="mail" id="mail" value="<?=$result['mail'] ?>">
        </p>
        <p>
            <button>Enregistrer</button>
        </p>
        <input type="hidden" name="id" value="<?= $result['id'] ?>">
    </form>
</body>
</html>