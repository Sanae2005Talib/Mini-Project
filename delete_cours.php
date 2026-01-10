<?php
require_once "config.php";
$pdo = getConnexion();
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM cours WHERE id = ?");
    $stmt->execute([$id]);
}
header("Location: index_cours.php");
exit();
?>