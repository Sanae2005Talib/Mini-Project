<?php
include_once "config.php";

// 1. Ajouter une inscription
function ajouter_inscription($etudiant_id, $cours_id)
{
    try {
        $cnx = getConnexion();
        $r = $cnx->prepare(
            "INSERT INTO inscription (etudiant_id, cours_id, dateInscription, statut) 
             VALUES (?, ?, NOW(), 'INSCRIT')"
        );
        $r->execute([$etudiant_id, $cours_id]);
    } catch (Throwable $th) {
        echo "Erreur ajout inscription : " . $th->getMessage();
    }
}
// 2. Supprimer une inscription
function supprimer_inscription($id)
{
    try {
        $cnx = getConnexion();
        $r = $cnx->prepare("DELETE FROM inscription WHERE id=?");
        $r->execute([$id]);
    } catch (Throwable $th) {
        echo "Erreur suppression inscription : " . $th->getMessage();
    }
}
// 3. Modifier une inscription (Statut et Note)
function modifier_inscription($statut, $note, $id)
{
    try {
        $cnx = getConnexion();
        $r = $cnx->prepare(
            "UPDATE inscription 
             SET statut=?, note=?
             WHERE id=?"
        );
        $r->execute([$statut, $note, $id]);
    } catch (Throwable $th) {
        echo "Erreur modification inscription : " . $th->getMessage();
    }
}
// 4. Afficher toutes les inscriptions (avec JOIN pour les noms)
function all_inscriptions()
{
    try {
        $cnx = getConnexion();
        // JOIN darori bach njibou smiyat li f les autres tables
        $r = $cnx->prepare("
            SELECT i.*, e.nom, e.prenom, c.intitule 
            FROM inscription i
            JOIN etudiant e ON i.etudiant_id = e.id
            JOIN cours c ON i.cours_id = c.id
            ORDER BY i.id DESC
        ");
        $r->execute();
        return $r->fetchAll();
    } catch (Throwable $th) {
        echo "Erreur sélection inscriptions : " . $th->getMessage();
    }
}

// 5. Chercher une inscription par ID (pour la page Edit)
function find_inscription_by_id($id)
{
    try {
        $cnx = getConnexion();
        // JOIN hna bach hta f l'Edit n3rfu smiyt l'étudiant li kankhadmou 3lih
        $r = $cnx->prepare("
            SELECT i.*, e.nom, e.prenom, c.intitule 
            FROM inscription i
            JOIN etudiant e ON i.etudiant_id = e.id
            JOIN cours c ON i.cours_id = c.id
            WHERE i.id=?
        ");
        $r->execute([$id]);
        return $r->fetch();
    } catch (Throwable $th) {
        echo "Erreur recherche inscription : " . $th->getMessage();
    }
}