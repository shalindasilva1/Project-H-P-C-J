<!DOCTYPE html>
<html>
  <?php include 'core/init.php';?>
  <?php include 'includes/head.php'; ?>
  <body>
    <?php include 'includes/header.php'; ?>

    <div class="error-content">
        <?php
          include 'includes/widgets/loginwerror.php';
        ?>
    </div>
    <div class="errors">
      <?php echo $errors[0]; ?>
    </div>
    <?php include 'includes/footer.php'; ?>
  </body>
</html>
