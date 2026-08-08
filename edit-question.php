<?php
    require('actions/users/securityAction.php');
    require('actions/questions/getinfosOfEditedQuestionAction.php');
    require('actions/questions/editQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <br><br>
    <div class="container">
     <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>';} ?>

     <?php
        if(isset($question_content)){
            ?>
            
                <form method="post">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Object de la question</label>
                            <input type="text" id="exampleFormControlInput1" class="form-control" name="title" value="<?= $question_title ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description de la question</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description"> <?= $question_description ?> </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea2" class="form-label">Que voullez-vous dire ??</label>
                            <textarea class="form-control" id="exampleFormControlTextarea2" name="content"><?= $question_content ?></textarea>
                        </div>

                    <button type="submit" class="btn btn-primary" name="validate">Modifier la question</button>     
                </form>
    
            <?php
        }
     ?>

    </div>
   

</body>
</html>