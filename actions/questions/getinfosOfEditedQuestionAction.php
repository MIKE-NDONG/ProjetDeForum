<?php

require('actions/db.php');

//Verifier si l'id de la question est bien passé en parametre dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfQuestion = $_GET['id'];

    //Vérifier si la question existe
    $questionExist = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $questionExist->execute(array($idOfQuestion));

    if($questionExist->rowCount() > 0){
        
    //Récuperer les infos de la question
    $questionInfos = $questionExist->fetch();
    if($questionInfos['id_auteur'] == $_SESSION['id']){

        $question_title = $questionInfos['titre'];
        $question_description = $questionInfos['description'];
        $question_content = $questionInfos['contenu'];

        $question_description = str_replace ( '<br />', '' , $question_description);
        $question_content = str_replace ( '<br />', '' , $question_content);

    }else{
        $errorMsg ="Vous n'ètes pas l'auteur de cette question";
    }
    
    }else{
        $errorMsg ="Aucune question trouver";
    }

}else{
    $errorMsg ="Aucune question trouver";
}