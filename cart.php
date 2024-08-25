<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier avec PHP et jQuery</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        <button id="empty-cart">Vider le panier</button>
    </div>
    <script src="js/jquery-3.7.1.js"></script>
    <script src="js/cart.js"></script>
    <script>
        $(document).ready(function() {
            function updateCart() {
                $.ajax({
                    url: 'cart1.php',
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        const cartItems = $('#cart-items');
                        const cartTotal = $('#cart-total');
                        cartItems.empty();
                        
                        let total = 0;

                        data.forEach(item => {
                            cartItems.append(`<li>${item.name} - ${item.price}€</li>`);
                            total += parseFloat(item.price);
                        });

                        cartTotal.text(`Total: ${total}€`);
                    }
                });
            }

            $('.add-to-cart').click(function() {
                const product = $(this).closest('.product');
                const id = product.data('id');
                const name = product.data('name');
                const price = product.data('price');

                $.ajax({
                    url: 'addcart.php',
                    method: 'POST',
                    data: { id, name, price },
                    success: function() {
                        updateCart();
                    }
                });
            });

            updateCart(); // Initial update

            $('#empty-cart').click(function() {
                $.ajax({
                    url: 'empty_cart.php',
                    method: 'POST',
                    success: function() {
                        updateCart();
                    }
                });
            });

            updateCart();
        });
    </script>
</body>
</html>
