<?php

require_once('connect.php');
$contactId = $_GET['contact_id_contact'] ?? null;


if ($contactId == null) {
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
      
        <form method="post" action="contact_tel_save.php?contact_id_contact=<?= $contactId ?>">
          <div class="mb-3">
            <label for="telephone" class="form-label">Numéro de téléphone</label>
            <input type="number"  class="form" value="" id="num_tel" name="num_tel">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>