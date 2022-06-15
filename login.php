<?php


require('connect.php');
include('function.php');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // affichage du formulaire
    $html = '<form method="POST" action="">';
    $html .= '<div>';
    $html .= '<input type="email" name="email" placeholder="Email" />';
    $html .= '</div>';
    $html .= '<div>';
    $html .= '<input type="password" name="password" placeholder="Password" />';
    $html .= '</div>';
    $html .= '<div>';
    $html .= '<button type="submit">Login</button>';
    $html .= '</div>';

    echo $html;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assainissement des données
    $email = strip_tags(trim($_POST['email']));
    $password = strip_tags(trim($_POST['password']));

    // Récupération d'un utilisateur ayant pour email l'adresse fournie dans le formulaire
    $q = $db->prepare('SELECT * from users WHERE email=:email');
    $q->execute([
        ':email' => $email
    ]);
    $existingUser = $q->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        $hashedPassword = $existingUser['password'];
        $isPasswordValid = password_verify($password, $hashedPassword);
    }

    $authenticated = $existingUser && $isPasswordValid;

    echo $authenticated =  header('Location: contact_list.php') ? 'Successfully authenticated' : 'Incorrect email/password';
}