<?php
require_once('connect.php');

$query = $db->query('select * from contact');
$query->execute();

$contacts = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<a href="add.php" class="btn btn-success m-3">Ajouter</a>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<table class="table table-dark">
    <tr>
        <th>#</th>
        <th>Nom</th>
        <th>Prenom</th>
    </tr>
<?php foreach($contacts as $contact): ?>
    <tr>
        <td><?= $contact['id'] ?></td>
        <td><?= $contact['nom'] ?></td>
        <td><?= $contact['prenom'] ?></td>
        <td>
            <a onclick="return confirm('Voulez-vous vraiment supprimer cet élement ?')" 
            href="contact_remove.php?id=<?= $contact['id'] ?>" class="btn btn-danger">SUPPRIMER</a>
            <a href="contact_edit.php?id=<?= $contact['id'] ?>" class="btn btn-primary">MODIFIER</a>
            <a href="read_contact.php?id=<?= $contact['id'] ?>" class="btn btn-primary">Détail</a>
        </td>
    </tr>
<?php endforeach; ?>

</table>