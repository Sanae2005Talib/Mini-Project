<?php
require_once "config.php";
$pdo = getConnexion();
$profs = $pdo->query("SELECT * FROM professeur")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO cours (code, intitule, description, dureeHeures, prix, professeur_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['code'], $_POST['intitule'], $_POST['description'], $_POST['duree'], $_POST['prix'], $_POST['professeur_id'] ?: null]);
    header("Location: index_cours.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php include "_menu.php"; ?>
    <div class="container mt-5">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-header bg-success text-white"><h4>Nouveau Cours</h4></div>
            <div class="card-body p-4">
                <form method="post">
                    <div class="row">
                        <div class="col-6 mb-3"><label>Code</label><input name="code" class="form-control" required></div>
                        <div class="col-6 mb-3"><label>Prix (DH)</label><input type="number" step="0.01" name="prix" class="form-control" required></div>
                    </div>
                    <div class="mb-3"><label>Intitulé</label><input name="intitule" class="form-control" required></div>
                    <div class="mb-3"><label>Durée (h)</label><input type="number" name="duree" class="form-control" required></div>
                    <div class="mb-3">
                        <label>Professeur</label>
                        <select name="professeur_id" class="form-select">
                            <option value="">-- Aucun --</option>
                            <?php foreach ($profs as $p): ?><option value="<?= $p['id'] ?>"><?= $p['nom']." ".$p['prenom'] ?></option><?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3"><label>Description</label><textarea name="description" class="form-control"></textarea></div>
                    <button class="btn btn-success w-100">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>