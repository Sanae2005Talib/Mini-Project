<?php

include_once "professeur_functions.php";

supprimer_professeur($_GET['id']);

header("Location: index_professeur.php");


?>