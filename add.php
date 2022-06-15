<?php
require_once('connect.php');
$id = $_GET['id'] ?? null;

if ($id != null) {
  $query = $db->query("select * from contact where id=$id");

  $contact = $query->fetch(PDO::FETCH_ASSOC);

  if ($contact == null) {
    header('location: contact_list.php');
    exit;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-8 mt-3">

        <form method="post" action="add_save.php<?= $id != null ? "?id=$id" : '' ?>">
          <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" value="<?= $contact['nom'] ?? '' ?>" id="nom" name="nom">
          </div>

          <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" value="<?= $contact['prenom'] ?? '' ?>" id="prenom" name="prenom">
          </div>
          <div class="mb-3">
            <label for="mail" class="form-label">E-mail</label>
            <input type="text" class="form-control" value="<?= $contact['mail'] ?? '' ?>" id="mail" name="mail">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
   
</body>

</html>