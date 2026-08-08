<?php

require('actions/db.php');

if(isset($_POST['validate'])){

    if(!isset($_SESSION['auth'])){

        $errorMsg = "Vous devez être connecté pour répondre à une question";

    }elseif(!empty($_POST['answer'])){

        $user_answer = nl2br(htmlspecialchars($_POST['answer']));

        $insertAnswer = $bdd->prepare('INSERT INTO answers(id_auteur, pseudo_auteur, id_question, contenu) VALUES (?, ?, ?, ?)');
        $insertAnswer->execute(array($_SESSION['id'], $_SESSION['pseudo'], $_GET['id'], $user_answer));

    }

}