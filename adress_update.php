<?php
require_once('connect.php');


if(isset($_POST)){
    if (isset($_POST['id_adresse']) && !empty($_POST['id_adresse'])){
        $idAdress = strip_tags($_POST['id_adresse']);
        $rue = strip_tags($_POST['rue']);
        $numero = strip_tags($_POST['numero']);
        $ville = strip_tags($_POST['ville']);
        $codePostal = strip_tags($_POST['code_postal']);
      

        $sql = "UPDATE adresse SET rue= :rue, numero = :numero, code_postal = :code_postal, ville = :ville  WHERE `id_adresse`=:id_adresse";

        $query = $db->prepare($sql);

        $query->bindValue(':id_adresse', $idAdress, PDO::PARAM_INT);
        $query->bindValue(':rue', $rue, PDO::PARAM_STR);
        $query->bindValue(':numero', $numero, PDO::PARAM_INT);
        $query->bindValue(':ville', $ville, PDO::PARAM_STR);
        $query->bindValue(':code_postal', $codePostal, PDO::PARAM_INT);
       

        $query->execute();
    

        header('Location: contact_list.php');
    }
}
if(isset($_GET['id_adresse']) && !empty($_GET['id_adresse'])){
    $idAdress = strip_tags($_GET['id_adresse']);
    $sql = "SELECT * FROM `adresse` WHERE `id_adresse`= :id_adresse;";

    $query = $db->prepare($sql);

    $query->bindValue(':id_adresse', $idAdress, PDO::PARAM_INT);
 
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
    <h1>Modifier une adresse</h1>
    <form method="post">
     
    <p>  <label for="numero" class="form-label">Numéro</label>  <input type="number"  class="form" value="<?= $numero ?? ''; ?>" id="numero" name="numero"></p>
          <p>  <label for="rue" class="form-label">Rue</label> <input type="text"  class="form" value="<?= $rue ?? ''; ?>" id="rue" name="rue"></p>
          <p>  <label for="code_postal" class="form-label">Code postal</label> <input type="number"  class="form" value="<?= $codePostal ?? ''; ?>" id="code_postal" name="code_postal"></p>
           <p> <label for="ville" class="form-label">Ville</label>  <input type="text"  class="form" value="<?= $ville ?? ''; ?>" id="ville" name="ville"><p>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
          <input type="hidden" name="id_adresse" value="<?= $result['id_adresse'] ?>">
        </form>
      </div>
    </div>
  </div>
</body>

</html>