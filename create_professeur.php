<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des Professeurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include_once "_menu.php" ?>

<div class="container mt-5">
    
    <h2 class="text-center text-primary mb-4">Ajouter un professeur</h2>
    
    <div class="row">
        <div class="col-md-6 mx-auto shadow p-4 rounded bg-light">
            <form action="store_professeur.php" method="post">
                
                <div class="mb-3">
                    <label for="matricule" class="form-label">Matricule :</label>
                    <input type="text" name="matricule" class="form-control" id="matricule" placeholder="Ex: PR1234" required>
                </div>

                <div class="mb-3">
                    <label for="nom" class="form-label">Nom :</label>
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom du professeur" required>
                </div>

                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom :</label>
                    <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prénom du professeur" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="exemple@mail.com" required>
                </div>

                <div class="mb-3">
                    <label for="telephone" class="form-label">Téléphone :</label>
                    <input type="text" name="telephone" class="form-control" id="telephone" placeholder="06XXXXXXXX">
                </div>

                <div class="mb-3">
                    <label for="specialite" class="form-label">Spécialité :</label>
                    <input type="text" name="specialite" class="form-control" id="specialite" placeholder="Ex: Informatique, Math...">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="index_professeur.php" class="btn btn-outline-secondary">Retour</a>
                </div>

            </form>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>