<?php

require('actions/db.php');

//validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si les champs sont remplis
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){

        //Vérifier que la question appartient bien à l'utilisateur connecté
        $checkQuestionOwner = $bdd->prepare('SELECT id_auteur FROM questions WHERE id = ?');
        $checkQuestionOwner->execute(array($idOfQuestion));
        $questionOwner = $checkQuestionOwner->fetch();

        if($questionOwner AND $questionOwner['id_auteur'] == $_SESSION['id']){

            //Les données à faire passer dans la requete
            $new_question_title = nl2br(htmlspecialchars($_POST['title']));
            $new_question_description = nl2br(htmlspecialchars($_POST['description']));
            $new_question_content = nl2br(htmlspecialchars($_POST['content']));

            //Modifier les informations de la question qui possede l'id entrer en paramètre
            $editquestionOnwebsite = $bdd->prepare('UPDATE questions SET titre = ?, description = ?, contenu = ? WHERE id = ?');
            $editquestionOnwebsite->execute(array($new_question_title,$new_question_description,$new_question_content,$idOfQuestion));

            //Redirection vers la page d'affichage des question de l'utilisateur
            header('Location: my-question.php');
            exit;

        }else{
            $errorMsg = "Vous n'êtes pas l'auteur de cette question";
        }

    }else{
        $errorMsg = "veuillez completer tous les champs";
    }

}