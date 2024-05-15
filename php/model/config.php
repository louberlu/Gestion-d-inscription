<?php
// Nom du serveur de base de données
define('DB_SERVER', 'localhost');

// Nom d'utilisateur de la base de données
define('DB_USERNAME', 'root');

// Mot de passe de la base de données
define('DB_PASSWORD', '');

// Nom de la base de données
define('DB_NAME', 'pjinscription');

// Connexion à la base de données
try {
    $bdd = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Définir le mode d'erreur PDO sur exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERREUR: Impossible de se connecter. " . $e->getMessage());
}
?>
