<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Recherche de Produits</title>
</head>
<body>
    <form action="resultat.php" method="POST">
        <label for="name">Nom du produit :</label>
        <input type="text" id="name" name="name">
        
        <label for="type">description :</label>
        <input type="text" id="description" name="description">
        
        <label for="min_price">Prix minimum :</label>
        <input type="number" id="min_price" name="min_price" step="0.01">
        
        <label for="max_price">Prix maximum :</label>
        <input type="number" id="max_price" name="max_price" step="0.01">
        
        <button type="submit">Rechercher</button>
    </form>
</body>
</html>
