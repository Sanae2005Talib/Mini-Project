<?php
require_once "config.php";

// Fonction pour récupérer tous les cours avec le nom du prof (Jointure)
function getAllCours() {
    $pdo = getConnexion();
    $sql = "SELECT cours.*, professeur.nom AS prof_nom, professeur.prenom AS prof_prenom
            FROM cours
            LEFT JOIN professeur ON cours.professeur_id = professeur.id";
    return $pdo->query($sql)->fetchAll();
}

// Fonction pour ajouter un cours
function addCours($code, $intitule, $description, $duree, $prix, $prof_id) {
    $pdo = getConnexion();
    $sql = "INSERT INTO cours (code, intitule, description, dureeHeures, prix, professeur_id) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$code, $intitule, $description, $duree, $prix, $prof_id ?: null]);
}

// Fonction pour supprimer un cours
function deleteCours($id) {
    $pdo = getConnexion();
    $stmt = $pdo->prepare("DELETE FROM cours WHERE id = ?");
    return $stmt->execute([$id]);
}

// Fonction pour récupérer un seul cours (pour la modification)
function getCoursById($id) {
    $pdo = getConnexion();
    $stmt = $pdo->prepare("SELECT * FROM cours WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}
?>