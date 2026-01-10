<?php $current_page = basename($_SERVER['PHP_SELF']); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-2">
  <div class="container">
    <a class="navbar-brand fw-bold" href="accueil.php">
        <i class="fa-solid fa-graduation-cap text-info me-2"></i>Gestion <span class="text-info">Inscriptions</span>
    </a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link px-3 <?= $current_page == 'accueil.php' ? 'active' : '' ?>" href="accueil.php">Accueil</a>
        </li>

     <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle <?= in_array($current_page, ['index.php', 'ajouter.php']) ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Étudiants
  </a>
  <ul class="dropdown-menu dropdown-menu-dark shadow">
    <li>
        <a class="dropdown-item py-2 text-success" href="ajouter.php">
            <i class="fa-solid fa-user-plus me-2"></i>Nouveau
        </a>
    </li>
    <li>
        <a class="dropdown-item py-2 text-info" href="index.php">
            <i class="fa-solid fa-list me-2"></i>Liste
        </a>
    </li>
  </ul>
</li>
     <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= in_array($current_page, ['index_professeur.php', 'create_professeur.php']) ? 'active' : '' ?>" href="#" data-bs-toggle="dropdown">Professeurs</a>
      <i class="fa-solid fa-user-graduate me-1"></i> Professeurs
  </a>
  <ul class="dropdown-menu dropdown-menu-dark shadow">
    <li>
        <a class="dropdown-item py-2 text-success" href="create_professeur.php">
            <i class="fa-solid fa-user-plus me-2"></i>Nouveau
        </a>
    </li>
    <li>
        <a class="dropdown-item py-2 text-info" href="index_professeur.php">
            <i class="fa-solid fa-list me-2"></i>Liste
        </a>
    </li>
  </ul>
</li>

    

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= in_array($current_page, ['index_cours.php', 'create_cours.php', 'edit_cours.php']) ? 'active' : '' ?>" href="#" data-bs-toggle="dropdown">Cours</a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item text-success" href="create_cours.php"><i class="fa-solid fa-plus me-2"></i>Nouveau Cours</a></li>
            <li><a class="dropdown-item text-info" href="index_cours.php"><i class="fa-solid fa-list me-2"></i>Liste des Cours</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>

</nav>
