<?php

require_once('connect.php');
/*Array
(
    [numero] => 15
    [rue] => gaga
    [code_postal] => 7780
    [ville] => clolk
)*/
$idContact = $_GET['id_contact'];


if(isset($_POST) && !empty($_POST)){
    $rue = $_POST['rue'] ?? null;
    $numero = $_POST['numero'] ?? null;
    $codePostal = $_POST['code_postal'] ?? null;
    $ville = $_POST['ville'] ?? null;
    
}

//var_dump($ville);exit;

$rq = $db->prepare('insert into adresse (rue, numero, code_postal, ville, id_contact) values (:rue,:numero,:code_postal,:ville, :id_contact)');
$rq->bindparam(':rue',$rue);
$rq->bindparam(':numero',$numero);
$rq->bindparam(':code_postal',$codePostal);
$rq->bindparam(':ville',$ville);
$rq->bindparam(':id_contact',$idContact);


$rq->execute();

var_dump($rq); exit;


header('location :read_contact.php');



