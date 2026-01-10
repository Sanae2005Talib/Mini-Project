<?php
require_once "config.php";
$pdo = getConnexion();

$sql = "SELECT cours.*, professeur.nom AS prof_nom, professeur.prenom AS prof_prenom
        FROM cours
        LEFT JOIN professeur ON cours.professeur_id = professeur.id";
$cours = $pdo->query($sql)->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Gestion des Cours</title>
</head>
<body class="bg-light">
    <?php include "_menu.php"; ?>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary fw-bold"><i class="fa-solid fa-book-open me-2"></i>Catalogue des Cours</h2>
            <a href="create_cours.php" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> Ajouter un cours</a>
        </div>

        <div class="card shadow-sm border-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Code</th><th>Intitulé</th><th>Durée</th><th>Prix</th><th>Professeur</th><th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cours as $c): ?>
                    <tr>
                        <td><span class="badge bg-info text-dark"><?= htmlspecialchars($c['code']) ?></span></td>
                        <td class="fw-bold"><?= htmlspecialchars($c['intitule']) ?></td>
                        <td><?= $c['dureeHeures'] ?> h</td>
                        <td class="text-success fw-bold"><?= number_format($c['prix'], 2) ?> DH</td>
                        <td><?= $c['prof_nom'] ? '<i class="fa-solid fa-user-tie me-1"></i>'.htmlspecialchars($c['prof_nom']." ".$c['prof_prenom']) : '<span class="text-muted small italic">Aucun</span>' ?></td>
                        <td class="text-center">
                            <a href="edit_cours.php?id=<?= $c['id'] ?>" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-pen"></i></a>
                            <a href="delete_cours.php?id=<?= $c['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Supprimer ce cours ?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>