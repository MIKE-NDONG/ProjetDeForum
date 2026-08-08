<?php

if(session_status() === PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION['auth'])){
    header('Location: ../../login.php');
    exit;
}

require('../db.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfTheQuestion = $_GET['id'];

    $checkIfQuestionExist = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExist->execute(array($idOfTheQuestion));

    if($checkIfQuestionExist->rowCount() > 0){

        $questionInfos = $checkIfQuestionExist->fetch();
        if($questionInfos['id_auteur'] == $_SESSION['id']){

            $deleteThisQuestion = $bdd->prepare('DELETE FROM questions WHERE id = ?');
            $deleteThisQuestion->execute(array($idOfTheQuestion));

            header('Location: ../../my-question.php');
            exit;
        }else{
            echo "Vous ne pouvez pas supprimer cette question !!😤😤";
        }

    }else{
        echo "Aucune question ,n'a été trouver";
    }

    }else{
    echo "Aucune question ,n'a été trouver";
}