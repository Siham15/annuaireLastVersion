<?php
require_once('connect.php');


if(isset($_POST)){
    if (isset($_POST['id_telephone']) && !empty($_POST['id_telephone'])){
        $idTelephone = strip_tags($_POST['id_telephone']);
        $telephone = strip_tags($_POST['num_tel']);
      

        $sql = "UPDATE `telephone` SET `num_tel`=:num_tel WHERE `id_telephone`=:id_telephone;";

        $query = $db->prepare($sql);

        $query->bindValue(':id_telephone', $idTelephone, PDO::PARAM_INT);
        $query->bindValue(':num_tel', $telephone, PDO::PARAM_INT);
       

        $query->execute();
    

        header('Location: contact_list.php');
    }
}
if(isset($_GET['id_telephone']) && !empty($_GET['id_telephone'])){
    $idTelephone = strip_tags($_GET['id_telephone']);
    $sql = "SELECT * FROM `telephone` WHERE `id_telephone`= :id_telephone;";

    $query = $db->prepare($sql);

    $query->bindValue(':id_telephone', $idTelephone, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Contact</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h1>Modifier un numéro</h1>
    <form method="post">
     
        <p>
            <label for="num_tel"> Numéro de téléphone </label>
            <input type="number" name="num_tel" id="num_tel" value="<?=$result['num_tel'] ?>">
        </p>
        <p>
            <button>Enregistrer</button>
        </p>
        <input type="hidden" name="id_telephone" value="<?= $result['id_telephone'] ?>">
    </form>
</body>
</html>