<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier avec jQuery</title>
    <style>
        .product { margin-bottom: 10px; }
        .cart { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="product" data-id="1" data-name="Produit 1" data-price="10">
        <span>Produit 1 - 10€</span>
        <button class="add-to-cart">Ajouter au panier</button>
    </div>
    <div class="product" data-id="2" data-name="Produit 2" data-price="20">
        <span>Produit 2 - 20€</span>
        <button class="add-to-cart">Ajouter au panier</button>
    </div>

    <div class="cart">
        <h2>Panier</h2>
        <ul id="cart-items"></ul>
        <p id="cart-total">Total: 0€</p>
    </div>

    <script src="js/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function() {
    let cart = [];

    function updateCart() {
        const cartItems = $('#cart-items');
        const cartTotal = $('#cart-total');
        cartItems.empty();

        let total = 0;

        cart.forEach(item => {
            cartItems.append(`<li>${item.name} - ${item.price}€</li>`);
            total += item.price;
        });

        cartTotal.text(`Total: ${total}€`);
    }

    $('.add-to-cart').click(function() {
        const product = $(this).closest('.product');
        const id = product.data('id');
        const name = product.data('name');
        const price = parseFloat(product.data('price'));

        const existingItem = cart.find(item => item.id === id);

        if (existingItem) {
            // Si l'article est déjà dans le panier, ne rien faire ou ajuster la quantité
            // Pour cet exemple, nous n'ajustons pas la quantité
        } else {
            cart.push({ id, name, price });
        }

        updateCart();
    });
});

    </script>
</body>
</html>
