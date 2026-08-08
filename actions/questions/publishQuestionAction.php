<?php

require('actions/db.php');

if(isset($_POST['validate'])){

    //Vérifier si les champs ne sont pas vide
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
        
        //Les données de la question
        $question_title = htmlspecialchars($_POST['title']);
        $question_description = nl2br(htmlspecialchars($_POST['description']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_date = date('Y-m-d H:i:s');
        $question_id_author = $_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];

        //Inserer la question sur le site
        $insertQuestionOnForum = $bdd->prepare('INSERT INTO questions(titre, description, contenu, id_auteur, pseudo_auteur, date_publication) VALUES (?, ?, ?, ?, ?, ?)');
        $insertQuestionOnForum->execute(
            array(
                $question_title, 
                $question_description,
                $question_content,
                $question_id_author, 
                $question_pseudo_author,
                $question_date
            )
        );

        $succesMsg = "Question publiée";

    }else{
        $errorMsg = "Veullez completer tous les champs";
    }
}