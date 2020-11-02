<?php
function insertInquiryByProId($conn, $proId, $file){	
    $product=getProductRequestById($conn, $proId);
    $inquiring_user_id=$_SESSION['user'] ['id'];
	$stmtinsert=$conn->prepare("INSERT INTO tbl_inquiry (`pro_id`,`inquiry_to`,`inquiry_by`,`inquiry_pro_photo`) 
    VALUES (:pro_id,:inquiry_to,:inquiry_by,:inquiry_pro_photo)");
    $stmtinsert->bindParam(':pro_id', $proId);
    $stmtinsert->bindParam(':inquiry_to', $product['pro_requesting_user']);
    $stmtinsert->bindParam(':inquiry_by', $inquiring_user_id);
    $stmtinsert->bindParam(':inquiry_pro_photo', $file);
	if ($stmtinsert->execute()) {
		return true;
	}
	return false;
}

function getAllInquiriesByUserId($conn, $userId){
    $stmtSelect = $conn->prepare("SELECT * FROM tbl_inquiry where inquiry_to=:inquiry_to");
    $stmtSelect->bindParam(':inquiry_to',$userId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}

function getInquiryByInquiryId($conn, $inquiryId){
    $stmtSelect = $conn->prepare("SELECT * FROM tbl_inquiry where inquiry_id=:inquiry_id");
    $stmtSelect->bindParam(':inquiry_id',$inquiryId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function getAllInquiries($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tbl_inquiry");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function deleteInquiryByProId($conn, $pro_id){
    $stmtdelete=$conn->prepare("DELETE FROM tbl_inquiry WHERE pro_id=:pro_id");
    $stmtdelete->bindParam(':pro_id', $pro_id);
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}
 function deleteProductInquiry($conn, $inquiry_id){
    $stmtdelete=$conn->prepare("DELETE FROM tbl_inquiry WHERE inquiry_id=:inquiry_id");
    $stmtdelete->bindParam(':inquiry_id', $inquiry_id);
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
 }