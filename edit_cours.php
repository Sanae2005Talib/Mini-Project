<?php
include_once "fonctions_cours.php";
$pdo = getConnexion();

// 1. On récupère l'ID depuis l'URL
$id = $_GET['id'] ?? null;

// 2. On récupère les infos du cours pour pré-remplir le formulaire
$cours = getCoursById($id);

// Si le cours n'existe pas, on dégage
if (!$cours) {
    header("Location: index_cours.php");
    exit();
}

// 3. Traitement du formulaire quand on clique sur "Modifier"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $success = modifier_cours(
        $_POST['code'],
        $_POST['intitule'],
        $_POST['description'],
        $_POST['duree'],
        $_POST['prix'],
        $_POST['professeur_id'],
        $id // Utilise la variable $id récupérée plus haut
    );

    if ($success) {
        header("Location: index_cours.php");
        exit();
    }
}

// Pour la liste déroulante des profs
$profs = $pdo->query("SELECT * FROM professeur")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Modifier Cours</title>
</head>
<body class="bg-light">
    <?php include "_menu.php"; ?>
    <div class="container mt-5">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-header bg-warning text-dark"><h4>Modifier le cours : <?= htmlspecialchars($cours['intitule']) ?></h4></div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label>Code</label>
                        <input type="text" name="code" class="form-control" value="<?= htmlspecialchars($cours['code']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Intitulé</label>
                        <input type="text" name="intitule" class="form-control" value="<?= htmlspecialchars($cours['intitule']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Durée (h)</label>
                        <input type="number" name="duree" class="form-control" value="<?= $cours['dureeHeures'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Prix (DH)</label>
                        <input type="number" step="0.01" name="prix" class="form-control" value="<?= $cours['prix'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Professeur</label>
                        <select name="professeur_id" class="form-select">
                            <option value="">-- Aucun --</option>
                            <?php foreach ($profs as $p): ?>
                                <option value="<?= $p['id'] ?>" <?= ($p['id'] == $cours['professeur_id']) ? 'selected' : '' ?>>
                                    <?= $p['nom'] . " " . $p['prenom'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control"><?= htmlspecialchars($cours['description']) ?></textarea>
                    </div>
                    <button class="btn btn-warning w-100">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>