<?php
include_once "professeur_functions.php";
include_once "_menu.php" ;

$prof = find_professeur_by_id($_GET['id']);
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier Professeur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto shadow p-4 bg-white rounded border">
            <h2 class="text-center text-primary mb-4">Modifier professeur</h2>

            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?= $prof['id'] ?>">

                <div class="mb-3">
                    <label class="form-label fw-bold">Matricule</label>
                    <input type="text" name="matricule" class="form-control" value="<?= $prof['matricule'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Nom</label>
                    <input type="text" name="nom" class="form-control" value="<?= $prof['nom'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Prénom</label>
                    <input type="text" name="prenom" class="form-control" value="<?= $prof['prenom'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $prof['email'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Téléphone</label>
                    <input type="text" name="telephone" class="form-control" value="<?= $prof['telephone'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Spécialité</label>
                    <input type="text" name="specialite" class="form-control" value="<?= $prof['specialite'] ?>">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-lg">Modifier les informations</button>
                    <a href="index_professeur.php" class="btn btn-outline-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>