<?php

require_once('connect.php');

$contactId = $_GET['contact_id_contact'];

$telephone = $_POST['num_tel'] ?? null;



if($telephone == null) {
    echo 'Tous les champs sont obligatoires';
    exit;
}

$query = $db->query('insert into telephone (`num_tel`, `contact_id_contact`) values (' . $telephone . ', ' . $contactId . ')');

//var_dump($query);exit;
if ($query == false) {
    echo 'Une erreur s\'est produite, veuillez réessayer plus tard !';
    exit;
}

header('location: read_contact.php?id='.$contactId);