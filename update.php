<?php
include_once "professeur_functions.php";

modifier_professeur(
    $_POST['matricule'],
    $_POST['nom'],
    $_POST['prenom'],
    $_POST['email'],
    $_POST['telephone'],
    $_POST['specialite'],
    $_POST['id']
);

header("Location: index_professeur.php");