<?php
include_once "config.php";

//  ajouter professeur
function ajouter_professeur($matricule, $nom, $prenom, $email, $telephone, $specialite)
{
    try {
        $cnx = getConnexion();
        $r = $cnx->prepare(
            "INSERT INTO professeur 
            (matricule, nom, prenom, email, telephone, specialite)
            VALUES (?,?,?,?,?,?)"
        );
        $r->execute([$matricule, $nom, $prenom, $email, $telephone, $specialite]);
    } catch (Throwable $th) {
        echo "Erreur ajout professeur : " . $th->getMessage();
    }
}

//  supprimer professeur
function supprimer_professeur($id)
{
    try {
        $cnx = getConnexion();
        $r = $cnx->prepare("DELETE FROM professeur WHERE id=?");
        $r->execute([$id]);
    } catch (Throwable $th) {
        echo "Erreur suppression professeur : " . $th->getMessage();
    }
}

//  modifier professeur
function modifier_professeur($matricule, $nom, $prenom, $email, $telephone, $specialite, $id)
{
    try {
        $cnx = getConnexion();
        $r = $cnx->prepare(
            "UPDATE professeur 
             SET matricule=?, nom=?, prenom=?, email=?, telephone=?, specialite=?
             WHERE id=?"
        );
        $r->execute([$matricule, $nom, $prenom, $email, $telephone, $specialite, $id]);
    } catch (Throwable $th) {
        echo "Erreur modification professeur : " . $th->getMessage();
    }
}

//  afficher tous les professeurs
function all_professeurs()
{
    try {
        $cnx = getConnexion();
        $r = $cnx->prepare("SELECT * FROM professeur ORDER BY id DESC");
        $r->execute();
        return $r->fetchAll();
    } catch (Throwable $th) {
        echo "Erreur sélection professeurs : " . $th->getMessage();
    }
}

//  chercher professeur par id
function find_professeur_by_id($id)
{
    try {
        $cnx = getConnexion();
        $r = $cnx->prepare("SELECT * FROM professeur WHERE id=?");
        $r->execute([$id]);
        return $r->fetch();
    } catch (Throwable $th) {
        echo "Erreur recherche professeur : " . $th->getMessage();
    }
}