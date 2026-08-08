<?php 
    session_start();
    require('actions/questions/showAllQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container">

        <form method="GET">

            <div class="form-group">

                <div class="col-8">
                    <input type="search" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn-success" type="submit">Rechercher</button>
                </div>

            </div>
        </form>

        <br>

        <?php
            while($question = $getAllQuestion->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                        <a href="article.php?id=<?php echo $question['id']; ?>">
                        <?php echo $question['titre']; ?>
                        </a>
                    </div>
                    <div class="card-body">
                        <?php echo $question['description']; ?>
                    </div>
                    <div class="card-footer">
                        publié par <a href="profile.php?id=<?= $question['id_auteur']; ?>"><?php echo $question['pseudo_auteur']; ?></a> le <?php echo $question['date_publication']; ?>
                    </div>
                </div>
                <br>
                <?php
            }
        ?>

    </div>

</body>
</html>