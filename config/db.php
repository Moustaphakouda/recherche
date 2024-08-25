<?php 
try {
    $db = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');
    // echo ('connecter');
} catch (Exception $e) {
    print_r("erreur de connexion" . $e->getMessage() . '!');
}