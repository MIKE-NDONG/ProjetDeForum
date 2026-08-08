<?php

require('actions/db.php');

$getAllAnswersOfThisQuestion = $bdd->prepare('SELECT id, pseudo_auteur, id_question, contenu FROM answers WHERE id_question = ? ORDER BY id DESC');
$getAllAnswersOfThisQuestion->execute(array($idOfTheQuestion));