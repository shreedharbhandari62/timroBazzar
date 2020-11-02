<?php
include 'layouts/header.php';
  $confirm_id=$_GET['ref'];
  if(deleteConfirmedInquiry($conn, $confirm_id)){
    showMsg('Confirmation Deleted Successfully');
    redirection('confirmedinquires.php');
  }