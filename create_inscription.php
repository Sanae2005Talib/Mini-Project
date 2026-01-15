<?php
require_once "fonctions_etudiant.php";
require_once "fonctions_cours.php";

$etudiants = getAllEtudiants();
$cours = getAllCours();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nouvelle Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <?php include_once "_menu.php" ?>

    <div class="container mt-5">
        
        <h2 class="text-center text-primary mb-4 fw-bold">
            <i class="fa-solid fa-file-signature"></i> Nouvelle Inscription
        </h2>
        
        <div class="row">
            <div class="col-md-6 mx-auto shadow-lg p-4 rounded bg-white border-top border-primary border-4">
                <form action="store_inscription.php" method="post">
                    
                    <div class="mb-4">
                        <label for="etudiant_id" class="form-label fw-bold">
                            <i class="fa-solid fa-user-graduate text-secondary me-2"></i> Sélectionner l'Étudiant :
                        </label>
                        <select name="etudiant_id" id="etudiant_id" class="form-select form-select-lg" required>
                            <option value="" selected disabled>-- Choisir un étudiant --</option>
                            <?php foreach ($etudiants as $e): ?>
                                <option value="<?= $e['id'] ?>">
                                    <?= htmlspecialchars($e['nom'] . " " . $e['prenom']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="form-text">L'étudiant doit être déjà enregistré dans le système.</div>
                    </div>

                    <div class="mb-4">
                        <label for="cours_id" class="form-label fw-bold">
                            <i class="fa-solid fa-book-bookmark text-secondary me-2"></i> Sélectionner le Cours :
                        </label>
                        <select name="cours_id" id="cours_id" class="form-select form-select-lg" required>
                            <option value="" selected disabled>-- Choisir un cours --</option>
                            <?php foreach ($cours as $c): ?>
                                <option value="<?= $c['id'] ?>">
                                    <?= htmlspecialchars($c['intitule']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="date_inscription" class="form-label fw-bold">
                            <i class="fa-solid fa-calendar-day text-secondary me-2"></i> Date d'inscription :
                        </label>
                        <input type="date" name="date_inscription" id="date_inscription" class="form-control" value="<?= date('Y-m-d') ?>">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fa-solid fa-check-circle me-1"></i> Confirmer l'Inscription
                        </button>
                        <a href="index_inscription.php" class="btn btn-outline-secondary">
                            <i class="fa-solid fa-arrow-left me-1"></i> Retour à la liste
                        </a>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>