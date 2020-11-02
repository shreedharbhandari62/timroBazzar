<?php
  include 'layouts/header.php';
  
  if (isset($_POST['insert'])) {
  $proId=$_POST['pro_id'];  
  //$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $file=$_FILES["file"]["name"];
  $tmp_name=$_FILES['file']['tmp_name'];
  $path='../ProductImages/'.$file;
  move_uploaded_file($tmp_name, $path);
  $flag=1;
  $inquiries=getAllInquiries($conn);
  foreach ($inquiries as $key => $inquiry){
        if($proId==$inquiry['pro_id']&&$_SESSION['user'] ['id']==$inquiry['inquiry_by']){            
            $flag++;
        }
  }
  if($flag==1){ 
  	if(insertInquiryByProId($conn, $proId, $file)){
    	showMsg('Inquiry Sent To Product Requesting  User. Please Wait for Confirmation');  
    	redirection('productsrequests.php');
  	}  
  }else{
        showMsg2('Inquiry Has already Sent. Please Wait for Confirmation'); 
        redirection('productsrequests.php');
    }	
 }
?>
  