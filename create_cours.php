<?php
// On inclut le fichier de fonctions (qui inclut déjà config.php)
require_once "fonctions_cours.php";

// 1. Récupérer la liste des profs pour la liste déroulante
$pdo = getConnexion();
$profs = $pdo->query("SELECT * FROM professeur")->fetchAll();

// 2. Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // On appelle notre fonction définie dans fonctions_cours.php
    $success = addCours(
        $_POST['code'], 
        $_POST['intitule'], 
        $_POST['description'], 
        $_POST['duree'], 
        $_POST['prix'], 
        $_POST['professeur_id']
    );

    if ($success) {
        header("Location: index_cours.php");
        exit();
    } else {
        $erreur = "Une erreur est survenue lors de l'ajout.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Ajouter un Cours</title>
</head>
<body class="bg-light">
    <?php include "_menu.php"; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-success text-white py-3">
                        <h5 class="mb-0"><i class="fa-solid fa-plus-circle me-2"></i>Nouveau Cours</h5>
                    </div>
                    <div class="card-body p-4">
                        <?php if(isset($erreur)): ?>
                            <div class="alert alert-danger"><?= $erreur ?></div>
                        <?php endif; ?>

                        <form method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Code du cours</label>
                                    <input type="text" name="code" class="form-control" placeholder="ex: PHP-101" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Prix (DH)</label>
                                    <input type="number" step="0.01" name="prix" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Intitulé du cours</label>
                                <input type="text" name="intitule" class="form-control" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Durée (Heures)</label>
                                    <input type="number" name="duree" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Professeur</label>
                                    <select name="professeur_id" class="form-select">
                                        <option value="">-- Aucun --</option>
                                        <?php foreach ($profs as $p): ?>
                                            <option value="<?= $p['id'] ?>">
                                                <?= htmlspecialchars($p['nom'] . " " . $p['prenom']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success px-4">Enregistrer</button>
                                <a href="index_cours.php" class="btn btn-outline-secondary px-4">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>