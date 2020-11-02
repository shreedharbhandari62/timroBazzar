<?php
  include 'layouts/header.php';
  $pro_id=$_GET['ref'];
  if(deleteProductRequest($conn, $pro_id)){
    showMsg('Request Deleted Successfully');
    redirection('myrequests.php');
  }