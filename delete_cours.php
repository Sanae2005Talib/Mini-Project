<?php
// On utilise notre fichier de fonctions centralisé
require_once "fonctions_cours.php";

// On vérifie si l'ID est bien présent dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // On appelle la fonction de suppression
    deleteCours($_GET['id']);
}

// Redirection vers la liste
header("Location: index_cours.php");
exit();
?>