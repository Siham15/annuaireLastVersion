<?php

require_once('connect.php');

$idContact = $_GET['id_contact'];


if(isset($_POST) && !empty($_POST)){
    $rue = $_POST['rue'] ?? null;
    $numero = $_POST['numero'] ?? null;
    $codePostal = $_POST['code_postal'] ?? null;
    $ville = $_POST['ville'] ?? null;
    
}
 header('location: contact_list.php'); 
 
$rq = $db->prepare('insert into adresse (rue, numero, code_postal, ville, id_contact) values (:rue,:numero,:code_postal,:ville, :id_contact)');
$rq->bindparam(':rue',$rue);
$rq->bindparam(':numero',$numero);
$rq->bindparam(':code_postal',$codePostal);
$rq->bindparam(':ville',$ville);
$rq->bindparam(':id_contact',$idContact);


$rq->execute();

header('location :contact_list.php');



  