<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
require('actions/db.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Véfier si l'utilateur a bien complété tous les champs
    if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){

        //Les données de l'utisateur
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);

        //Vérifier si l'utilisateur existe (si le pseudo est correct)
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        if($checkIfUserExists->rowCount() > 0){

            //Récupérer les données de l'utilisateur
            $userInfo = $checkIfUserExists->fetch();

            //Vérifier si le mot de passe est correct
            if(password_verify($user_password, $userInfo['mdp'])){

                   //Authentifier l'utilisateur sur le site et récuprer ses données dans des variables globales SESSION
                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $userInfo['id'];
                    $_SESSION['lastname'] = $userInfo['nom'];
                    $_SESSION['firstname'] = $userInfo['prenom'];
                    $_SESSION['pseudo'] = $userInfo['pseudo'];
            
                    //Rediriger l'utilisateur vers la page d'acceuil
                    header('Location: index.php');
                    exit;
            }else{
                $errorMsg = "Le mot de passe est érroné";
            }
            
        }else{
            $errorMsg = "Pseudo incorrect";
        }

    }else{
        $errorMsg ="Veuillez remplir tous les champs ";
    }

}