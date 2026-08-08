<?php 
    session_start();
    require('actions/users/securityAction.php');
    require('actions/questions/myQuestionAction.php');  
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <br><br>
    <div class="container">

        <?php

            while($question = $getAllMyquestions->fetch()){
                ?>
                <div class="card">
                    <h5 class="card-header">
                        <a href="article.php?id=<?php echo $question['id']; ?>">
                        <?php echo $question['titre']; ?>
                        </a>
                    </h5>
                    <div class="card-body" >
                        <p class="card-text">
                            <?= $question['description']; ?>
                        </p>
                        <a href="article.php?id=<?= $question['id'] ?>" class="btn btn-primary">Acceder à la question</a>
                        <a href="edit-question.php?id=<?= $question['id']; ?>" class="btn btn-warning">Modifier la question</a>
                        <a href="actions/questions/deleteQuestionAction.php?id=<?= $question['id']; ?>" class="btn btn-danger">Supprimer la question</a>
                    </div>
                </div>
                <br>
                <?php
            }
        ?>
    </div>
</body>
</html>