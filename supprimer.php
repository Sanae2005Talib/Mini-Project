<?php
require_once('fonctions_etudiant.php');
if(isset($_GET['id'])){
    deleteEtudiant($_GET['id']);
}
header("Location: index.php");
?>