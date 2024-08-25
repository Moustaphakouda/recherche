<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de Produits</title>
    <style>
        .categorie-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
        }
        .categorie-button:hover {
            background-color: #0056b3;
        }
        .selected {
            background-color: #0056b3; /* Couleur pour indiquer la sélection */
        }
    </style>
    <script src="../js/jquery-3.7.1.js"></script>
</head>
<body>
    <h1>Recherche de Produits</h1>
    
    <form method="POST" action="result_prod.php" id="formRecherche">
        <h3>Catégorie:</h3>
        <input type="hidden" name="categorie" id="categorie" value="">

        <div class="categorie-button" data-categorie="Électronique">Électronique</div>
        <div class="categorie-button" data-categorie="Vêtements">Vêtements</div>
        <div class="categorie-button" data-categorie="Livres">Livres</div>
        <!-- Ajoutez d'autres divs pour d'autres catégories ici -->

        <h3>price:</h3>
        <label for="price_min">price Min:</label>
        <input type="number" id="price_min" name="price_min" value="">
        
        <label for="price_max">price Max:</label>
        <input type="number" id="price_max" name="price_max" value="">
        
        <h3>Nombre:</h3>
        <label for="nombre_min">Nombre Min:</label>
        <input type="number" id="nombre_min" name="nombre_min" value="">
        
        <label for="nombre_max">Nombre Max:</label>
        <input type="number" id="nombre_max" name="nombre_max" value="">
        
        <h3>Lieu:</h3>
        <label for="lieu">Lieu:</label>
        <input type="text" id="lieu" name="lieu" value="">
        
        <button type="submit">Rechercher</button>
    </form>

    <script>
        $(document).ready(function() {
            $('.categorie-button').click(function() {
                // Réinitialiser la sélection des catégories
                $('.categorie-button').removeClass('selected');

                // Définir la valeur du champ caché
                var categorie = $(this).data('categorie');
                $('#categorie').val(categorie);

                // Ajouter la classe 'selected' à l'élément cliqué
                $(this).addClass('selected');
            });
        });
    </script>
</body>
</html>
