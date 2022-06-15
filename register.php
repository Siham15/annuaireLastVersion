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
    $html .= '<input type="password" name="password-confirmation" placeholder="Password confirmation" />';
    $html .= '</div>';
    $html .= '<div>';
    $html .= '<button type="submit">Register</button>';
    $html .= '</div>';

    echo $html;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assainissement des données
    $email = strip_tags(trim($_POST['email']));
    $password = strip_tags(trim($_POST['password']));
    $passwordConfirmation = strip_tags(trim($_POST['password-confirmation']));

    // Les deux champs mots de passe correspondent-ils ?
    if ($password !== $passwordConfirmation) {
        throw new Exception('Passwords don`t match');
        return;
    }

    // L'adresse email est-elle déjà utilisée ?
    $q = $db->prepare('SELECT COUNT(*) from users WHERE email=:email');
    $q->bindParam(':email', $email);
    $q->execute();

    if ($q->fetch()[0] === 1) {
        // Notre 'COUNT(*)' vaut 1 : l'adresse email est déjà prise
        throw new Exception('Email already taken');
        return;
    }

    // Les mots de passe concordent et l'email est inconnu
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $q = $db->prepare('INSERT INTO users (email, password) VALUES(:email, :hash)');
    $q->execute([
        ':email' => $email,
        ':hash' => $hash,
    ]);

    header('Location:/login.php');
}