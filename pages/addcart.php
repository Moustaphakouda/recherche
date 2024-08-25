<?php
session_start();

// Initialiser le panier s'il n'existe pas
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Ajouter un produit au panier
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Ajouter l'article au panier
    $_SESSION['cart'][] = [
        'id' => $id,
        'name' => $name,
        'price' => $price
    ];
}
?>
