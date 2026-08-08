<?php

require('actions/db.php');

//Récupérer l'id de l'utilisateur
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //L'id de l'utilisateur
    $idOfUser = $_GET['id'];

    //Vérifie si l'utilisateur exist
    $checkIfUserExist = $bdd->prepare('SELECT pseudo, nom, prenom FROM users WHERE id = ?');
    $checkIfUserExist->execute(array($idOfUser));

    if($checkIfUserExist->rowCount() > 0){

        //Récuperer toutes les données de l'utilsateur
        $userInfos = $checkIfUserExist->fetch();

        $user_pseudo = $userInfos['pseudo'];
        $user_lastname = $userInfos['nom'];
        $user_firstname = $userInfos['prenom'];

        //Récuperer toutes les questions publiées de l'utilisateur
        $getThisQuestions = $bdd->prepare('SELECT * FROM questions WHERE id_auteur = ? ORDER BY id DESC');
        $getThisQuestions->execute(array($idOfUser));


    }else{
        $errorMsg = "Aucun utilisateur trouvé ";
    }

}else{
    $errorMsg = "Aucun utilisateur trouvé ";
}