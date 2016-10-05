<?php
  include 'core/init.php';
  logged_in_redirect();
  include 'includes/head.php';
  include 'includes/header.php';
  $username = $password = "";
  if (empty($_POST) == false ) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) == true || empty($password) == true) {
      $errors[1] = '*Enter username and password';
    }
    else if (user_exist($username) == false){
      $errors[1] = '*You are not registerd';
    }
    else if (user_active($username) == false){
      $errors[1] = '*User account not active';
    }
    else{
      $login = login($username, $password);
      if ($login == false) {
        $errors[1] = '*Username password does not match';
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
    <?php echo $errors[1]; ?>
  </div>
  <?php



  }
  include 'includes/footer.php';

 ?>
