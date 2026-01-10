<?php
include_once "professeur_functions.php";
$professeurs = all_professeurs();
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des Professeurs</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-light">

       <?php include_once "_menu.php" ?>


    <div class="container mt-5">

        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'success'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Opération effectuée avec succès !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary"><i class="fa-solid fa-chalkboard-user"></i> Liste des professeurs</h2>
            <a href="create_professeur.php" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i> Nouveau Professeur
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Matricule</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Spécialité</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($professeurs as $p): ?>
                            <tr class="align-middle">
                                <td><strong><?= htmlspecialchars($p['matricule']) ?></strong></td>
                                <td><?= htmlspecialchars($p['nom']) ?></td>
                                <td><?= htmlspecialchars($p['prenom']) ?></td>
                                <td><?= htmlspecialchars($p['email']) ?></td>
                                <td><span class="badge bg-info text-dark"><?= htmlspecialchars($p['specialite']) ?></span></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="edit.php?id=<?= $p['id'] ?>" class="btn btn-warning" title="Modifier">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <a href="delete.php?id=<?= $p['id'] ?>"
                                            class="btn btn-danger"
                                            onclick="return confirm('Voulez-vous vraiment supprimer ce professeur ?')"
                                            title="Supprimer">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if (empty($professeurs)): ?>
                            <tr>
                                <td colspan="6" class="text-center py-4">Aucun professeur trouvé.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>