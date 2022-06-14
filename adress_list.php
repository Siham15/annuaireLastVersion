<?php
require_once('connect.php');
$idContact = $_GET['id'] ?? null;
 if ($idContact
 != null) :
$query = $db->query('SELECT * from adresse  where id_contact=' . $idContact);

$adresses = $query->fetchAll(PDO::FETCH_ASSOC); 

        
?>

<h3>Adresse(s)</h3>
    <a href="adress_save.php?id_contact=<?= $idContact
 ?>" class="btn btn-success btn-sm mt-3 mb-3">Ajouter</a>

    <ol class="list-group list-group-numbered">
        <?php foreach($adresses as $a): ?>
            <li class="list-group-item ">
                <div class="ms-2 me-auto">
                <?= $a['rue'] ?>  <?= $a['numero'] ?> <?= $a['code_postal'] ?> <?= $a['ville'] ?><br>
                </div>
            </li>
        <?php endforeach; ?>
    </ol> 

<?php
endif
?>
</html>