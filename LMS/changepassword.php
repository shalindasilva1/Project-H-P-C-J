<!DOCTYPE html>
<html>
<?php include 'core/init.php';
$errors[3] ='';
protected_page();
if (empty($_POST) === false){
  $list = array('password', 'new_password', 'passwoed_again');
  foreach ($_POST as $key => $value) {
    if (empty($value) && in_array($key, $list) === true) {

      $errors[2] ='*Marked fields are required';
    }
  }
  if (md5($_POST['password']) === $user_data['password']) {
    if ($_POST['new_password'] !== $_POST['password_again']) {
      $errors [3] = 'New password combination does not match';
    }else if(strlen($_POST['new_password']) < 6){
      $errors [3] = 'Password must be greater than 6 characters';
    }else{
      change_password($session_user_id, $_POST['new_password']);
      header ('Location: changepassword.php?sucsess');
    }
  }
  else{
    $errors[3] = 'Current password incorrect';
  }

}


include 'includes/head.php'; ?>
<body>
  <?php include 'includes/header.php'; ?>

  <div class="error-content">
      <?php
        include 'includes/widgets/changepasswordw.php';
      ?>
  </div>
  <div class="errors">
    <?php echo $errors[2]; ?>
    <br>
    <?php echo $errors[3]; ?>
  </div>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
