<?php require_once('fonctions_etudiant.php'); $etudiants = getAllEtudiants(); ?>
<?php include_once "professeur_functions.php"; $professeurs = all_professeurs(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Gestion des Inscriptions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
            margin-bottom: 50px;
        }
        .stat-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        .stat-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
        }
    </style>
</head>
<body class="bg-light">
    <?php include_once "_menu.php" ?>
    
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-4">
                <i class="fa-solid fa-graduation-cap me-3"></i>
                Gestion des Inscriptions
            </h1>
            <p class="lead mb-4">Gérez efficacement vos étudiants et professeurs</p>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <a href="index.php" class="btn btn-light btn-lg">
                            <i class="fas fa-users me-2"></i>Gérer les Étudiants
                        </a>
                        <a href="index_professeur.php" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-chalkboard-user me-2"></i>Gérer les Professeurs
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="container mb-5">
        <h2 class="text-center mb-5 text-primary">
            <i class="fas fa-chart-line me-2"></i>Tableau de bord
        </h2>
        
        <div class="row g-4">
            <!-- Étudiants Card -->
            <div class="col-md-6">
                <div class="card stat-card shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="stat-icon bg-primary bg-gradient text-white">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h3 class="card-title h2 mb-3"><?= count($etudiants) ?></h3>
                        <p class="card-text text-muted mb-4">Étudiants inscrits</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="index.php" class="btn btn-primary btn-sm" title="Voir la liste des étudiants">
                                <i class="fas fa-list me-1"></i>Voir la liste
                            </a>
                            <a href="ajouter.php" class="btn btn-outline-primary btn-sm" title="Ajouter un nouvel étudiant">
                                <i class="fas fa-plus me-1"></i>Ajouter
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Professeurs Card -->
            <div class="col-md-6">
                <div class="card stat-card shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="stat-icon bg-success bg-gradient text-white">
                            <i class="fas fa-chalkboard-user"></i>
                        </div>
                        <h3 class="card-title h2 mb-3"><?= count($professeurs) ?></h3>
                        <p class="card-text text-muted mb-4">Professeurs actifs</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="index_professeur.php" class="btn btn-success btn-sm" title="Voir la liste des professeurs">
                                <i class="fas fa-list me-1"></i>Voir la liste
                            </a>
                            <a href="create_professeur.php" class="btn btn-outline-success btn-sm" title="Ajouter un nouveau professeur">
                                <i class="fas fa-plus me-1"></i>Ajouter
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">
                            <i class="fas fa-clock me-2"></i>Activité récente
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="text-primary mb-3">
                                    <i class="fas fa-user-graduate me-2"></i>Derniers étudiants
                                </h6>
                                <?php if (!empty($etudiants)): ?>
                                    <?php $recent_etudiants = array_slice($etudiants, 0, 3); ?>
                                    <?php foreach ($recent_etudiants as $e): ?>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="bg-primary bg-gradient rounded-circle p-2 me-3">
                                                <i class="fas fa-user text-white small"></i>
                                            </div>
                                            <div>
                                                <strong><?= htmlspecialchars($e['nom'] . ' ' . $e['prenom']) ?></strong>
                                                <br><small class="text-muted"><?= htmlspecialchars($e['email']) ?></small>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="text-muted">Aucun étudiant inscrit</p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-success mb-3">
                                    <i class="fas fa-chalkboard-user me-2"></i>Derniers professeurs
                                </h6>
                                <?php if (!empty($professeurs)): ?>
                                    <?php $recent_professeurs = array_slice($professeurs, 0, 3); ?>
                                    <?php foreach ($recent_professeurs as $p): ?>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="bg-success bg-gradient rounded-circle p-2 me-3">
                                                <i class="fas fa-user-tie text-white small"></i>
                                            </div>
                                            <div>
                                                <strong><?= htmlspecialchars($p['nom'] . ' ' . $p['prenom']) ?></strong>
                                                <br><small class="text-muted"><?= htmlspecialchars($p['specialite']) ?></small>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="text-muted">Aucun professeur enregistré</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
