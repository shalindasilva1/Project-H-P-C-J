<div class="widget">
  <form class="login" action="logout.php" method="post">
    <table>
      <tr>
        <td>
          <h3>welcome back <?php echo $user_data['first_name'] ?></h3>
          <hr>
        </td>
        <td></td>
      </tr>
      <tr>
        <td>
          <a href="changepassword.php">Change Password</a>
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" name="logout" value="Logout">
        </td>
      </tr>
    </table>
  </form>
</div>
