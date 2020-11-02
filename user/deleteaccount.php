<?php
  include 'layouts/header.php';
  $user_id=$_SESSION['user'] ['id'];
  deleteSpecificUserAllProductRequest($conn, $user_id);
  if(deleteUser($conn, $user_id)){
    session_destroy();
    redirection ('../frontend/frontend.php');
  }