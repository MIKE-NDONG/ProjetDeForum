<?php

require('actions/db.php');

$getAllMyquestions = $bdd->prepare('SELECT id, titre, description FROM questions WHERE id_auteur = ? ORDER BY id DESC');
$getAllMyquestions->execute(array($_SESSION['id']));