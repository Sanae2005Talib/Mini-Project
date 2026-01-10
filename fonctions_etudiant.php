<?php
require_once('config.php');

// READ : Lister tous les étudiants
function getAllEtudiants() {
    $pdo = getConnexion();
    return $pdo->query("SELECT * FROM etudiant ORDER BY id DESC")->fetchAll();
}

// CREATE : Ajouter un étudiant
function addEtudiant($cne, $nom, $prenom, $email) {
    $pdo = getConnexion();
    $stmt = $pdo->prepare("INSERT INTO etudiant (cne, nom, prenom, email) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$cne, $nom, $prenom, $email]);
}

// DELETE : Supprimer un étudiant
function deleteEtudiant($id) {
    $pdo = getConnexion();
    $stmt = $pdo->prepare("DELETE FROM etudiant WHERE id = ?");
    return $stmt->execute([$id]);
}

// READ ONE : Récupérer un seul étudiant (pour la modification)
function getEtudiantById($id) {
    $pdo = getConnexion();
    $stmt = $pdo->prepare("SELECT * FROM etudiant WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

// UPDATE : Modifier un étudiant
function updateEtudiant($id, $cne, $nom, $prenom, $email) {
    $pdo = getConnexion();
    $stmt = $pdo->prepare("UPDATE etudiant SET cne=?, nom=?, prenom=?, email=? WHERE id=?");
    return $stmt->execute([$cne, $nom, $prenom, $email, $id]);
}
?>
