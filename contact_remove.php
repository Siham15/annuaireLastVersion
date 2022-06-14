<?php

require_once('connect.php');
$id = $_GET['id'] ?? null;


if ($id == null) {
    return header('location: contact_list.php');
}
// FORCER LE TYPE
$id = (int) $id;


if($id != null){
    $query = $db->query('DELETE FROM contact WHERE id =' . $id.'');
}
if ($query == false) {
    exit('Une errreur s\'est produite, veuillez réessayer plus tard !');
}

if ($query->rowCount() === 0) {
    exit('Enregistrement inconnu !!!');
}

header('location: contact_list.php');