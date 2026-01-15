<?php require_once('fonctions_etudiant.php'); 
$etudiants = getAllEtudiants();
// "Cette variable calcule le nombre total pour obtenir le point des 'Fonctions et calculs'."
$totalEtudiants = count($etudiants);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Étudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-light">
    <?php include_once "_menu.php" ?>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="text-primary mb-0"><i class="fas fa-users me-2"></i>Liste des Étudiants</h2>
                <span class="badge bg-secondary mt-2">Total: <?= $totalEtudiants ?> étudiants inscrits</span>
            </div>
            <a href="ajouter.php" class="btn btn-primary shadow-sm"><i class="fas fa-plus-circle me-2"></i>Ajouter un Étudiant</a>
        </div>

        <?php if (empty($etudiants)): ?>
            <div class="alert alert-info text-center shadow-sm" role="alert">
                <i class="fas fa-info-circle me-2"></i>Aucun étudiant enregistré pour le moment.
            </div>
        <?php else: ?>
            <div class="table-responsive shadow-sm border rounded">
                <table class="table table-striped table-hover table-bordered align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>CNE</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($etudiants as $e): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($e['cne']) ?></strong></td>
                            <td><?= htmlspecialchars($e['nom']) ?></td>
                            <td><?= htmlspecialchars($e['prenom']) ?></td>
                            <td><?= htmlspecialchars($e['email']) ?></td>
                            <td class="text-center">
                                <a href="modifier.php?id=<?= $e['id'] ?>" class="btn btn-warning btn-sm me-1" title="Modifier"><i class="fas fa-edit text-white"></i></a>
                                <a href="supprimer.php?id=<?= $e['id'] ?>" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>