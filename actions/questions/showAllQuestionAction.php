<?php

require('actions/db.php');

//Recuperer les questions par défaut sans recherche
$getAllQuestion = $bdd->query('SELECT id, titre, id_auteur, pseudo_auteur, description, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');

//Vérifier si la recherche est effectué
if(isset($_GET['search']) AND !empty($_GET['search'])){

    //La recherche
    $usersSearch = $_GET['search'];

    //Afficher tous les résultat possible de la recherche en fonction du titre
    $getAllQuestion = $bdd->prepare('SELECT id, titre, id_auteur, pseudo_auteur, description, date_publication FROM questions WHERE titre LIKE ? ORDER BY id DESC');
    $getAllQuestion->execute(array('%'.$usersSearch.'%'));


}