<?php

require_once('connect.php');
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
$id = $_GET['id'] ?? null;
function validation($key, $message){
    if (isset($_POST[$key]) == false  || empty($_POST[$key])) {
        echo $message;
        exit;
    }
}

validation('nom', 'Le nom est obligatoire');
validation('prenom', 'Le prenom est obligatoire');


$contact = $_POST;
if($id == null){
    $query = $db->query('insert into contact (`nom`, `prenom`) values ("'.$contact['nom'].'", "'.$contact['prenom'].'")');
} else {
    $query = $db->query('update contact set `nom` ="'.$contact['nom'].'" , `prenom`="'.$contact['prenom'].'" where id='.$id);
}

header('location: index.php');