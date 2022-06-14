<?php

$user = 'eleve';
$pass = 'eleve';

try {
    $db = new PDO('mysql:host=127.0.0.1;port=3307;dbname=annuaire', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}