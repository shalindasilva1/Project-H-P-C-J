<?php
function logged_in(){
  return (isset($_SESSION['user_id']))? true : false;
}

function user_exist($username){
  $username = sanitize($username);
  $query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `user_name` = '$username'");
  return (mysql_result($query, 0) == 1)? true : false;
}


function user_active($username){
  $username = sanitize($username);
  $query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `user_name` = '$username' AND `active` = 1");
  return (mysql_result($query, 0) == 1)? true : false;
}


function user_id_from_username($username){
  $username = sanitize($username);
  $query = mysql_query("SELECT `user_id` FROM `users` WHERE `user_name` = '$username'");
  return mysql_result($query, 0, 'user_id');
}


function login($username, $password){
  $user_id = user_id_from_username($username);

  $username = sanitize($username);
  $password = md5($password);

  $query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `user_name` = '$username' AND `password` = '$password'");
  return (mysql_result($query, 0) == 1) ? $user_id : false;
}

function first_name_from_userid($username){
$query = mysql_query("SELECT `first_name` FROM `users` WHERE `user_name` = '$username'");
return mysql_result($query, 0, 'first_name');
}
 ?>
