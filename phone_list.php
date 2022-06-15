<?php
require_once('connect.php');
$contactId = $_GET['id'] ?? null;

  
 if ($contactId != null) :
$query = $db->query('SELECT * from telephone  where contact_id_contact=' . $contactId);

$telephones = $query->fetchAll(PDO::FETCH_ASSOC); 



?>

<h3>Numéros de téléphone</h3>
    <a href="phone_save.php?contact_id_contact=<?= $contactId ?>" class="btn btn-success btn-sm mt-3 mb-3">Ajouter</a>
   

    <ol class="list-group list-group-numbered">
        <?php foreach($telephones as $t): ?>



            <li class="list-group-item ">
                <div class="ms-2 me-auto">
                <?= $t['num_tel']?><br>  <a href="phone_update.php?id_telephone=<?= $t['id_telephone'] ?>" class="btn btn-success btn-sm mt-3 mb-3">Modifier</a>
    <a href="phone_delete.php?id_telephone=<?= $t['id_telephone']?>" class="btn btn-success btn-sm mt-3 mb-3">Supprimer</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ol> 

<?php
endif
?>
</html>