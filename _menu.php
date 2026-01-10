<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-2">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">
        <i class="fa-solid fa-file-invoice text-info me-2"></i>Gestion des  <span class="text-info">Inscriptions</span>
    </a>

    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link px-3 active" href="index.php">
              <i class="fa-solid fa-house-chimney me-1 small"></i> Home
          </a>
        </li>

        <li class="nav-item dropdown px-2">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              <i class="fa-solid fa-user-graduate me-1 small"></i> Professeurs
          </a>
          <ul class="dropdown-menu dropdown-menu-dark shadow border-secondary mt-2">
            <li>
                <a class="dropdown-item py-2" href="create_professeur.php">
                    <i class="fa-solid fa-plus text-success me-2"></i>Nouveau
                </a>
            </li>
            <li>
                <a class="dropdown-item py-2" href="index_professeur.php">
                    <i class="fa-solid fa-list-check text-info me-2"></i>Liste
                </a>
            </li>
          </ul>
        </li>
      </ul>

      <form class="d-flex" role="search" action="index_professeur.php" method="GET">
        <div class="input-group input-group-sm">
            <input class="form-control bg-secondary text-white border-0" type="search" name="search" placeholder="Rechercher..." style="width: 200px;">
            <button class="btn btn-info" type="submit">
                <i class="fa-solid fa-magnifying-glass fa-sm"></i>
            </button>
        </div>
      </form>
    </div>
  </div>
</nav>