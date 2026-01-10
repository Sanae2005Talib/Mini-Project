<?php   
include_once "professeur_functions.php";

ajouter_professeur(
    $_POST['matricule'],
    $_POST['nom'],
    $_POST['prenom'],
    $_POST['email'],
    $_POST['telephone'],
    $_POST['specialite']
);

header("Location: index_professeur.php");
//
?>