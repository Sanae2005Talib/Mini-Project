<?php
require_once "functions_inscription.php";

ajouter_inscription(
    $_POST['etudiant_id'],
    $_POST['cours_id']
);

header("Location: index_inscription.php");
exit;