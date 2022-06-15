<?php
require_once('connect.php');
$idContact = $_GET['id_contact'] ?? null;

if ($idContact == null) {
    header('location: contact_list.php');
    exit;
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
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-8 mt-3">
      
        <form method="post" action="contact_adress_save.php?id_contact=<?= $idContact ?>">
          <div class="mb-6">
          <p>  <label for="numero" class="form-label">Numéro</label>  <input type="number"  class="form" value="" id="numero" name="numero"></p>
          <p>  <label for="rue" class="form-label">Rue</label> <input type="text"  class="form" value="" id="rue" name="rue"></p>
          <p>  <label for="code_postal" class="form-label">Code postal</label> <input type="number"  class="form" value="" id="code_postal" name="code_postal"></p>
           <p> <label for="ville" class="form-label">Ville</label>  <input type="text"  class="form" value="" id="ville" name="ville"><p>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>

