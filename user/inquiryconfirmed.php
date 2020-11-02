<?php

  include 'layouts/header.php';
  $inquiryId=$_GET['ref'];
  echo $inquiryId;
  $flag=1;  
  $inquiry=getInquiryByInquiryId($conn, $inquiryId);
  
  $confirms=getAllConfirmedInquiries($conn);
  
  
  foreach ($confirms as $key => $confirm){

        if($inquiry['pro_id']==$confirm['confirm_pro_id']&&$inquiry['inquiry_to']==$confirm['confirm_by']){            
            $flag++;
        }
    }
  if($flag==1){ 
  	if(insertInquiryConfirmByInquiryId($conn, $inquiryId)){
    	showMsg('Inquiry Confirmation Sent To Inquiring User. Please Wait until User Contacts You');  
    	redirection('inquiries.php');
  	}  
  }else{
        showMsg2('Confirmation Has already Sent. Please Wait until User Contacts You'); 
        redirection('inquiries.php');
    }

?>
