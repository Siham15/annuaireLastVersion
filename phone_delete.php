<?php
require_once('connect.php');



if(isset($_GET)){
    if (isset($_GET['id_telephone']) && !empty($_GET['id_telephone'])){
        $idTelephone = strip_tags($_GET['id_telephone']);
       
       

        $sql = "DELETE FROM `telephone`  WHERE `id_telephone`=:id_telephone;";

        $query = $db->prepare($sql);

        $query->bindValue(':id_telephone', $idTelephone, PDO::PARAM_INT);
        
       
 

if ($query == false) {
    exit('Une errreur s\'est produite, veuillez réessayer plus tard !');
}
        $query->execute();

    
    if ($query == false) {
    exit('Une errreur s\'est produite, veuillez réessayer plus tard !');
}

    }
}

header('Location: contact_list.php');
if(isset($_GET['id_telephone']) && !empty($_GET['id_telephone'])){
    $idTelephone = strip_tags($_GET['id_telephone']);
    $sql = "SELECT * FROM `telephone` WHERE `id_telephone`= :id_telephone;";

    $query = $db->prepare($sql);

    $query->bindValue(':id_telephone', $idTelephone, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
}


//header("Location: read_contact.php");