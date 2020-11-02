<?php
  include 'layouts/header.php';
  $user_id=$_GET['ref'];
  if(deleteUser($conn, $user_id)){
    showMsg('User Deleted Successfully');
    redirection('manageuser.php');
  }