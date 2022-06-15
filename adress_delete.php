<?php
  
require_once('connect.php');


if(isset($_GET)){
    if (isset($_GET['id_adresse']) && !empty($_GET['id_adresse'])){
        $idAdresse = strip_tags($_GET['id_adresse']);
       
       

        $sql = "DELETE FROM `adresse`  WHERE `id_adresse`=:id_adresse;";

        $query = $db->prepare($sql);

        $query->bindValue(':id_adresse', $idAdresse, PDO::PARAM_INT);
        
       
 

if ($query == false) {
    exit('Une errreur s\'est produite, veuillez réessayer plus tard !');
}
        $query->execute();

    
    if ($query == false) {
    exit('Une errreur s\'est produite, veuillez réessayer plus tard !');
}

header('Location: contact_list.php');
    }
}

if(isset($_GET['id_adresse']) && !empty($_GET['id_adresse'])){
    $idAdresse = strip_tags($_GET['id_adresse']);
    $sql = "SELECT * FROM `adresse` WHERE `id_adresse`= :id_adresse;";

    $query = $db->prepare($sql);

    $query->bindValue(':id_adresse', $idAdresse, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
}
header('Location: contact_list.php');