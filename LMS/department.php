<!DOCTYPE html>
<html>
<?php include 'core/init.php';
  protected_page();
  include 'includes/head.php'; ?>
  <body>
    <?php include 'includes/header.php'; ?>

    <div class="content">

      <?php
      if (logged_in() === true){
        include 'includes/widgets/loggedinw.php';
      }else {
        include 'includes/widgets/loginw.php';
      }
      ?>

      <h1>DEPARTMENT PAGE</h1>
    </div>

    <?php include 'includes/footer.php'; ?>
  </body>
</html>
