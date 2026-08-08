<?php require('actions/users/signupAction.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php';?>
<body>
      <br><br>
      <form class="container" method="post">

         <?php  if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
      
      <div class="mb-3">
         <label for="exampleFormControlInput1" class="form-label">Pseudo</label>
         <input type="text" id="exampleFormControlInput1" class="form-control" name="pseudo">
      </div>
      <div class="mb-3">
         <label for="exampleFormControlInput2" class="form-label">Nom</label>
         <input type="text" id="exampleFormControlInput2" class="form-control" name="lastname">
      </div>
      <div class="mb-3">
         <label for="exampleFormControlInput3" class="form-label">Prénom</label>
         <input type="text" id="exampleFormControlInput3" class="form-control" name="firstname">
      </div>
         <div class="mb-3">
         <label for="exampleFormControlInput4" class="form-label">password</label>
         <input type="password" id="exampleFormControlInput4" class="form-control" name="password">
      </div>
      <button type="submit" class="btn btn-primary" name="validate">s'inscrire</button>
      <br><br>
      <a href="login.php"><p>compte déjà créer ??,connectez-vous</p></a>
      
     </form>


</body>
</html>