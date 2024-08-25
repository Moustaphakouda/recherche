<?php
session_start();

// Renvoyer les articles du panier au format JSON
if (isset($_SESSION['cart'])) {
    echo json_encode($_SESSION['cart']);
} else {
    echo json_encode([]);
}
?>
