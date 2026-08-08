<?php
    session_start();
    require('actions/users/showOneUserProfile.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container">
        <?php
            if(isset($errorMsg)){ echo $errorMsg ;}

            if(isset($getThisQuestions)){

                ?>
                <div class="card">
                    <div class="card-body">
                        <h4>@<?= $user_pseudo ;?></h4>
                        <hr>
                        <p><?= $user_lastname . ' ' .$user_firstname;?></p>
                    </div>
                </div>
                <br>
                <?php
                while($question = $getThisQuestions->fetch()){
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <?= $question['titre']; ?>
                        </div>
                        <br>
                        <div class="card-body">
                            <?= $question['description']; ?>
                        </div>
                        <br>
                        <div class="card-footer">
                            par <?= $question['pseudo_auteur']; ?> le <?= $question['date_publication']; ?>
                        </div>
                        <br>
                    </div>
                    <br>
                    <?php

                }

            }
        ?>
    </div>

</body>
</html>