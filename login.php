<?php
require('actions/users/loginAction.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <br><br>
    <form class="container" method="post">

      <?php  if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
    
     <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Pseudo</label>
        <input type="text" id="exampleFormControlInput1" class="form-control" name="pseudo">
     </div>
       <div class="mb-3">
        <label for="exampleFormControlInput2" class="form-label">password</label>
        <input type="password" id="exampleFormControlInput2" class="form-control" name="password">
     </div>
     <button type="submit" class="btn btn-primary" name="validate">se connecter</button>
     <br><br>
     <a href="signup.php"><p>pas de compte ??,inscrivez-vous</p></a>
     
    </form>


</body>
</html>