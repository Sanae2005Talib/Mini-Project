<?php
require_once "functions_inscription.php";
$inscriptions = all_inscriptions();
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
                                            // Petit logic pour le style du statut
                                            $badgeClass = ($i['statut'] == 'Validé') ? 'bg-success' : 'bg-warning text-dark';
                                        ?>
                                        <span class="badge rounded-pill <?= $badgeClass ?>">
                                            <?= htmlspecialchars($i['statut']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-bold <?= ($i['note'] >= 10) ? 'text-success' : 'text-danger' ?>">
                                            <?= htmlspecialchars($i['note'] ?? '--') ?> / 20
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="edit_inscription.php?id=<?= $i['id'] ?>" class="btn btn-outline-warning" title="Modifier">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="delete_inscription.php?id=<?= $i['id'] ?>" 
                                               class="btn btn-outline-danger"
                                               onclick="return confirm('Voulez-vous vraiment supprimer cette inscription ?')"
                                               title="Supprimer">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <?php if (empty($inscriptions)): ?>
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <i class="fa-solid fa-folder-open fa-2x mb-3 d-block text-light"></i>
                                        Aucune inscription trouvée.
                                    </td>
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