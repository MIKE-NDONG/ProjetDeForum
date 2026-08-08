<?php

require('actions/db.php');

//Verifier si l'id de la question est rentrée dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //Récupérer l'id de la question
    $idOfTheQuestion = $_GET['id'];

    //Vérifier si la question est enregistrée
    $checkIfQuestionExist = $bdd->prepare('SELECT * FROM questions WHERE id = ? ');
    $checkIfQuestionExist->execute(array($idOfTheQuestion));

    if($checkIfQuestionExist->rowCount() > 0){
        
        //Récuperer toutes les données de la questions
        $questionInfos = $checkIfQuestionExist->fetch();

        //Stoker les données de la question dans des variables propre
        $question_title = $questionInfos['titre'];
        $question_content = $questionInfos['contenu'];
        $question_id_author = $questionInfos['id_auteur'];
        $question_pseudo_author = $questionInfos['pseudo_auteur'];
        $question_publication_date = $questionInfos['date_publication'];

    }else{
        $errorMsg = "Aucune question trouvée";
    }

}else{
    $errorMsg = "Aucune question trouvée";
}