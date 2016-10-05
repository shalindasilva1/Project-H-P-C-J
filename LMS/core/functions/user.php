<?php
function change_password($user_id, $password){
  $password = md5($password);
  $user_id = (int)$user_id;
  mysql_query("UPDATE `users` SET `password` = '$password' WHERE `user_id` = $user_id");

}

function user_data($user_id){
  $data  = array();
  $user_id = (int)$user_id;
  $num_args = func_num_args();
  $get_args = func_get_args();

  if ($get_args > 1){
    unset($get_args[0]);

    $list = '`'.implode('`,`',$get_args).'`';
    $query = mysql_query("SELECT $list from `users` WHERE `user_id` = $user_id");
    $data =mysql_fetch_assoc($query);
    return $data;
  }
}

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
 ?>
