<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
require('actions/db.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Véfier si l'utilateur a bien complété tous les champs
    if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password'])){

        //Les données de l'utisateur
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //Vérifié si l'utilsateur exist déjà sur le site
        $verify = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $verify->execute(array($user_pseudo));
        
        if($verify->rowCount() == 0){

            //Inserer l'utilisateur dans la bdd
            $ifverify = $bdd->prepare('INSERT INTO users(pseudo, nom, prenom, mdp)VALUES(?, ?, ?, ?) ');
            $ifverify->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

            //Récuper les info de l'utilisateur
            $takeInfoUser = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom = ? AND prenom = ? AND pseudo = ?');
            $takeInfoUser->execute(array($user_lastname, $user_firstname, $user_pseudo));

            $userInfo = $takeInfoUser->fetch();

            //Authentifier l'utilisateur sur le site et récuprer ses données dans des variables globales SESSION
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $userInfo['id'];
            $_SESSION['lastname'] = $userInfo['nom'];
            $_SESSION['firstname'] = $userInfo['prenom'];
            $_SESSION['pseudo'] = $userInfo['pseudo'];
            
            //Rediger l'utilisateur vers la page d'acceuil
            header('Location: index.php');
            exit;

        }else{
            $errorMsg = "Cet utisateur est déja enregistrer";
        }

    }else{
        $errorMsg ="Veuillez remplir tous les champs ";
    }
}
