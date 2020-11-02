<?php
  include 'layouts/header.php';
  $proId=$_GET['ref'];
  if(insertSealedDealByProId($conn, $proId)){
  	if(deleteInquiryByProId($conn, $proId)){
  		if (deleteConfirmedInquiryByProId($conn, $proId)) {  	
  			if(deleteSealedDealProductRequest($conn, $proId)){
    			showMsg('Product Transaction Completed. Your request have been removed. Thanks!!!');  
    			redirection('sealedDeal.php');
			}
		}
	}
  }  

?>