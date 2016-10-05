<?php
function sanitize  ($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  $data =  mysql_real_escape_string($data);
  return $data;
}

function protected_page(){
  if (logged_in() === false){
    header ('Location: ruonly.php');
    exit();
  }
}

function logged_in_redirect(){
  if (logged_in() === true){
    header('Location: index.php');
  }

}
 ?>
