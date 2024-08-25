<?php
// Configuration de la connexion à la base de données avec PDO
$dsn = 'mysql:host=localhost;dbname=ecommerce;charset=utf8';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Échec de la connexion : " . $e->getMessage());
}

// Récupération des paramètres de recherche
$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$min_price = $_POST['min_price'] ?? 0;
$max_price = $_POST['max_price'] ?? PHP_INT_MAX;

// Construction de la requête SQL avec des paramètres
$sql = "SELECT * FROM produits WHERE price BETWEEN :min_price AND :max_price";
$parameters = [
    ':min_price' => $min_price,
    ':max_price' => $max_price,
];

if (!empty($name)) {
    $sql .= " AND name LIKE :name";
    $parameters[':name'] = "%$name%";
}
if (!empty($description)) {
    $sql .= " AND description LIKE :description";
    $parameters[':description'] = "%$description%";
}
if (!empty($brand)) {
    $sql .= " AND brand LIKE :brand";
    $parameters[':brand'] = "%$brand%";
}

// Préparation et exécution de la requête
$stmt = $pdo->prepare($sql);
$stmt->execute($parameters);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Affichage des résultats
?>
<!DOCdescription html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de la Recherche</title>
</head>
<body>
    <h1>Résultats de la Recherche</h1>
    <a href="index.php">Retourner au formulaire de recherche</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>description</th>
            <th>Marque</th>
            <th>Prix</th>
        </tr>
        <?php if (count($results) > 0): ?>
                    <?php foreach ($results as $row): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['id_produits']); ?></td>
                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                                    <td><?php echo htmlspecialchars($row['price']); ?></td>
                                </tr>
                    <?php endforeach; ?>
        <?php else: ?>
                    <tr>
                        <td colspan="5">Aucun résultat trouvé.</td>
                    </tr>
        <?php endif; ?>
    </table>
</body>
</html>

<?php
// Fermeture de la connexion
$pdo = null;
?>
