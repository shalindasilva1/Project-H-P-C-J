<?php
  include 'core/init.php';
  include 'includes/head.php';
  include 'includes/header.php';
  $username = $password = "";
  if (empty($_POST) == false ) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) == true || empty($password) == true) {
      $errors[] = 'enter username & password';
    }
    else if (user_exist($username) == false){
      $errors[] = 'user does not exist';
    }
    else if (user_active($username) == false){
      $errors[] = 'user not active';
    }
    else{
      $login = login($username, $password);
      if ($login == false) {
        $errors[] = 'username password does not match';
      }
      else{
        $_SESSION['user_id'] = $login;
        header('Location: index.php');
        exit();
      }
    }
    //body starts here
  ?>
  <div class="error-content">
      <?php
      if (logged_in() === true){
        include 'includes/widgets/loggedinw.php';
      }else {
        include 'includes/widgets/loginwerror.php';
      }
      ?>
  </div>
  <div class="errors">
    <?php echo $errors[0]; ?>
  </div>
  <?php



  }
  include 'includes/footer.php';

 ?>
