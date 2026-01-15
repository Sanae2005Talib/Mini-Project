<?php

include_once "functions_inscription.php";

supprimer_inscription($_GET['id']);

header("Location: index_inscription.php");


?>