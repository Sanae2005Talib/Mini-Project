<?php 
require_once('fonctions_etudiant.php');
$message = ''; // Pour afficher des messages d'erreur ou de succès

if(isset($_POST['valider'])){
    if(!empty($_POST['cne']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])){
        if(addEtudiant($_POST['cne'], $_POST['nom'], $_POST['prenom'], $_POST['email'])){
            header("Location: index.php?message=success_add"); // Rediriger avec un message de succès
            exit(); // Toujours appeler exit() après une redirection
        } else {
            $message = '<div class="alert alert-danger"><i class="fas fa-exclamation-triangle me-2"></i>Erreur lors de l\'ajout.</div>';
        }
    } else {
        $message = '<div class="alert alert-warning"><i class="fas fa-exclamation-circle me-2"></i>Veuillez remplir tous les champs obligatoires (CNE, Nom, Prénom, Email).</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 <style>
    .navbar .container {
        background-color: transparent !important;
        box-shadow: none !important;
    }
    
    .page-content {
        background-color: #ffffff;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        margin-top: 20px;
    }
</style>
</head>
<body class="bg-light">
    <?php include_once "_menu.php" ?>
    <div class="container mt-5">
        <h3 class="text-primary mb-4"><i class="fas fa-user-plus me-2"></i>Ajouter un Nouvel Étudiant</h3>
        <?= $message ?>
        <form method="POST" class="col-md-8 mx-auto p-4 border rounded shadow-sm">
            <div class="mb-3">
                <label for="cne" class="form-label"><i class="fas fa-id-card me-2"></i>CNE <span class="text-danger">*</span></label>
                <input type="text" name="cne" id="cne" class="form-control" placeholder="Entrez le CNE" required value="<?= htmlspecialchars($_POST['cne'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label"><i class="fas fa-user me-2"></i>Nom <span class="text-danger">*</span></label>
                <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrez le nom" required value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label"><i class="fas fa-user-circle me-2"></i>Prénom <span class="text-danger">*</span></label>
                <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Entrez le prénom" required value="<?= htmlspecialchars($_POST['prenom'] ?? '') ?>">
            </div>
            <div class="mb-4">
                <label for="email" class="form-label"><i class="fas fa-envelope me-2"></i>Email <span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Entrez l'email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" name="valider" class="btn btn-success"><i class="fas fa-save me-2"></i>Enregistrer</button>
                <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-alt-circle-left me-2"></i>Annuler</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>