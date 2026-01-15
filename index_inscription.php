<?php
require_once "functions_inscription.php";
require_once "config.php"; // Fichier li fih getConnexion()

// 1. Njibu la connexion PDO
$pdo = getConnexion();

// 2. Njibu la liste des inscriptions (JOIN)
$inscriptions = all_inscriptions();

// 3. Calculs pour les statistiques (Point: Fonctions et calculs)
// Moyenne avec gestion du cas NULL pour éviter l'erreur number_format
$resMoyenne = $pdo->query("SELECT AVG(note) FROM Inscription WHERE note IS NOT NULL")->fetchColumn();
$moyenneGenerale = ($resMoyenne !== null) ? (float)$resMoyenne : 0.0;

// Nombre total d'inscriptions validées
$totalValide = $pdo->query("SELECT COUNT(*) FROM Inscription WHERE statut = 'Validé'")->fetchColumn();
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des Inscriptions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-light">

    <?php include_once "_menu.php" ?>

    <div class="container mt-5">

        <div class="row mb-4 text-center">
            <div class="col-md-6 mb-3">
                <div class="card border-0 shadow-sm bg-white p-3">
                    <h6 class="text-muted"><i class="fa-solid fa-star text-warning me-2"></i>Moyenne Générale</h6>
                    <h3 class="fw-bold text-primary mb-0"><?= number_format($moyenneGenerale, 2) ?> / 20</h3>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card border-0 shadow-sm bg-white p-3">
                    <h6 class="text-muted"><i class="fa-solid fa-check-circle text-success me-2"></i>Inscriptions Validées</h6>
                    <h3 class="fw-bold text-success mb-0"><?= $totalValide ?></h3>
                </div>
            </div>
        </div>

        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'success'): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> Opération effectuée avec succès !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary fw-bold">
                <i class="fa-solid fa-file-signature me-2"></i> Liste des Inscriptions
            </h2>
            <a href="create_inscription.php" class="btn btn-primary shadow-sm">
                <i class="fa-solid fa-plus-circle me-1"></i> Nouvelle Inscription
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-info">
                            <tr>
                                <th scope="col" class="ps-3">Étudiant</th>
                                <th scope="col">Cours</th>
                                <th scope="col">Date</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Note</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($inscriptions as $i): ?>
                                <tr class="align-middle">
                                    <td class="ps-3">
                                        <div class="fw-bold text-dark"><?= htmlspecialchars($i['nom'] . " " . $i['prenom']) ?></div>
                                    </td>
                                    <td>
                                        <span class="text-muted fw-semibold"><?= htmlspecialchars($i['intitule']) ?></span>
                                    </td>
                                    <td>
                                        <i class="fa-regular fa-calendar-days text-secondary me-1"></i>
                                        <?= htmlspecialchars($i['dateInscription']) ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $badgeClass = ($i['statut'] == 'Validé') ? 'bg-success' : 'bg-warning text-dark';
                                        ?>
                                        <span class="badge rounded-pill <?= $badgeClass ?>">
                                            <?= htmlspecialchars($i['statut']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-bold <?= ($i['note'] >= 10) ? 'text-success' : 'text-danger' ?>">
                                            <?= ($i['note'] !== null) ? number_format($i['note'], 2) . " / 20" : "--" ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="edit_inscription.php?id=<?= $i['id'] ?>" class="btn btn-outline-warning shadow-sm"><i class="fa-solid fa-pen"></i></a>
                                            <a href="delete_inscription.php?id=<?= $i['id'] ?>" class="btn btn-outline-danger shadow-sm" onclick="return confirm('Supprimer?')"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <?php if (empty($inscriptions)): ?>
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">Aucune inscription trouvée.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>