<?php
require_once "functions_inscription.php";
require_once "_menu.php";

// T-akked blli l'ID kayn f l'URL
if (!isset($_GET['id'])) {
    header("Location: index_inscription.php");
    exit();
}

$i = find_inscription_by_id($_GET['id']);

if (!$i) {
    die("Inscription introuvable !");
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto shadow-lg p-4 bg-white rounded border-top border-warning border-4">
            
            <h2 class="text-center text-warning mb-4 fw-bold">
                <i class="fa-solid fa-pen-to-square me-2"></i> Modifier Inscription
            </h2>

            <div class="alert alert-secondary py-2 border-0 shadow-sm">
                <small class="text-muted d-block">Étudiant :</small>
                <strong><?= htmlspecialchars($i['nom'] . " " . $i['prenom']) ?></strong>
                <hr class="my-1">
                <small class="text-muted d-block">Cours :</small>
                <strong><?= htmlspecialchars($i['intitule']) ?></strong>
            </div>

            <form action="update_inscription.php" method="post">
                <input type="hidden" name="id" value="<?= $i['id'] ?>">

                <div class="mb-4">
                    <label for="statut" class="form-label fw-bold">
                        <i class="fa-solid fa-signal text-warning me-2"></i> Statut de l'inscription
                    </label>
                    <select name="statut" id="statut" class="form-select form-select-lg">
                        <option value="INSCRIT" <?= ($i['statut'] == 'INSCRIT') ? 'selected' : '' ?>>INSCRIT</option>
                        <option value="ANNULE" <?= ($i['statut'] == 'ANNULE') ? 'selected' : '' ?>>ANNULÉ</option>
                        <option value="TERMINE" <?= ($i['statut'] == 'TERMINE') ? 'selected' : '' ?>>TERMINÉ</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="note" class="form-label fw-bold">
                        <i class="fa-solid fa-star text-warning me-2"></i> Note finale (/20)
                    </label>
                    <div class="input-group">
                        <input type="number" step="0.25" min="0" max="20" name="note" id="note" 
                               class="form-control form-control-lg" 
                               value="<?= $i['note'] ?>" 
                               placeholder="Ex: 15.50">
                        <span class="input-group-text">/ 20</span>
                    </div>
                    <div class="form-text">Utilisez des points pour les décimales (ex: 14.75).</div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning btn-lg text-dark fw-bold">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Mettre à jour l'inscription
                    </button>
                    <a href="index_inscription.php" class="btn btn-outline-secondary">
                        <i class="fa-solid fa-xmark me-1"></i> Annuler
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>