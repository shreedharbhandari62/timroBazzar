<?php
include 'layouts/header.php';
 $inquiry_id=$_GET['ref'];
  if(deleteProductInquiry($conn, $inquiry_id)){
    showMsg('Inquiry Deleted Successfully');
    redirection('inquiries.php');
  }