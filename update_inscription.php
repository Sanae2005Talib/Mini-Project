<?php

include_once "functions_inscription.php";
modifier_inscription(
    $_POST['statut'],
    $_POST['note'],
    $_POST['id']
);


header("Location: index_inscription.php?msg=success");
exit();
?>