<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de la Recherche</title>
</head>
<body>
    <h1>Résultats de la Recherche</h1>

    <?php
    $dsn = 'mysql:host=localhost;dbname=ecommerce;charset=utf8';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $categorie = isset($_POST['categorie']) ? $_POST['categorie'] : '';
        $price_min = isset($_POST['price_min']) ? $_POST['price_min'] : '';
        $price_max = isset($_POST['price_max']) ? $_POST['price_max'] : '';
        $nombre_min = isset($_POST['nombre_min']) ? $_POST['nombre_min'] : '';
        $nombre_max = isset($_POST['nombre_max']) ? $_POST['nombre_max'] : '';
        $lieu = isset($_POST['lieu']) ? $_POST['lieu'] : '';

        $query = "SELECT * FROM produits WHERE 1=1";

        // Filtrer par catégorie
        if (!empty($categorie)) {
            $query .= " AND categorie = :categorie";
        }

        // Filtrer par price avec BETWEEN
        if (!empty($price_min) && !empty($price_max)) {
            $query .= " AND price BETWEEN :price_min AND :price_max";
        } elseif (!empty($price_min)) {
            $query .= " AND price >= :price_min";
        } elseif (!empty($price_max)) {
            $query .= " AND price <= :price_max";
        }

        // Filtrer par nombre avec BETWEEN
        if (!empty($nombre_min) && !empty($nombre_max)) {
            $query .= " AND nombre BETWEEN :nombre_min AND :nombre_max";
        } elseif (!empty($nombre_min)) {
            $query .= " AND nombre >= :nombre_min";
        } elseif (!empty($nombre_max)) {
            $query .= " AND nombre <= :nombre_max";
        }

        // Filtrer par lieu
        if (!empty($lieu)) {
            $query .= " AND lieu LIKE :lieu";
        }

        $stmt = $pdo->prepare($query);

        // Liaison des paramètres
        if (!empty($categorie)) {
            $stmt->bindParam(':categorie', $categorie);
        }
        if (!empty($price_min)) {
            $stmt->bindParam(':price_min', $price_min);
        }
        if (!empty($price_max)) {
            $stmt->bindParam(':price_max', $price_max);
        }
        if (!empty($nombre_min)) {
            $stmt->bindParam(':nombre_min', $nombre_min);
        }
        if (!empty($nombre_max)) {
            $stmt->bindParam(':nombre_max', $nombre_max);
        }
        if (!empty($lieu)) {
            $lieu_param = "%" . $lieu . "%";
            $stmt->bindParam(':lieu', $lieu_param);
        }

        $stmt->execute();
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($resultats) {
            foreach ($resultats as $row) {
                echo "Nom: " . $row['name'] . " - Catégorie: " . $row['categorie'] . " - price: " . $row['price'] . "€ - Nombre: " . $row['nombre'] . " - Lieu: " . $row['lieu'] . "<br>";
            }
        } else {
            echo "Aucun produit trouvé";
        }

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    ?>

    <br>
    <a href="index.php">Retourner à la recherche</a>
</body>
</html>
