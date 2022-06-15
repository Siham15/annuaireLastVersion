<?php

require_once('connect.php');

$id = $_GET['id'] ?? null;
function validation($key, $message){
    if (isset($_POST[$key]) == false  || empty($_POST[$key])) {
        echo $message;
        exit;
    }
}

validation('nom', 'Le nom est obligatoire');
validation('prenom', 'Le prenom est obligatoire');
validation('mail', 'Le mail est obligatoire');


$contact = $_POST;
if($id == null){
    $query = $db->query('insert into contact (`nom`, `prenom`, `mail`) values ("'.$contact['nom'].'", "'.$contact['prenom'].'", "'.$contact['mail'].'")');
} else {
    $query = $db->query('update contact set `nom` ="'.$contact['nom'].'" , `prenom`="'.$contact['prenom'].'", `mail`="'.$contact['mail'].'" where id='.$id);
}

header('location: read_contact.php');