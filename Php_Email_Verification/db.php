<?php 
$host = 'localhost'; // Adresse du serveur (localhost si en local)
$dbname = 'users_accent_verfy'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur MySQL
$password = ''; // Mot de passe MySQL (vide par défaut pour XAMPP)

// Tentative de connexion avec PDO
try {
    // Création de l'objet PDO
    $cnx = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Configuration des options PDO
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs
    $cnx->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Mode de récupération par défaut

    // echo "Connexion réussie à la base de données.";
} catch (PDOException $e) {
    // Gestion des erreurs
    echo "Erreur de connexion : " . $e->getMessage();
}
