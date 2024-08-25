<?php
session_start();

// Vider le panier
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}

// Réponse pour indiquer que le panier a été vidé
echo 'Cart cleared';
?>
