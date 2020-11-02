<?php
function insertInquiryConfirmByInquiryId($conn, $inquiryId){	
    $inquiry=getInquiryByInquiryId($conn, $inquiryId);
	$stmtinsert=$conn->prepare("INSERT INTO tbl_inquiry_confirm (`confirm_pro_id`,`confirm_to`,`confirm_by`) 
    VALUES (:confirm_pro_id,:confirm_to,:confirm_by)");
    $stmtinsert->bindParam(':confirm_pro_id', $inquiry['pro_id']);
    $stmtinsert->bindParam(':confirm_to', $inquiry['inquiry_by']);
    $stmtinsert->bindParam(':confirm_by', $inquiry['inquiry_to']);
	if ($stmtinsert->execute()) {
		return true;
	}
	return false;
}

function getAllInquiriesConfirmedByUserId($conn, $userId){
    $stmtSelect = $conn->prepare("SELECT * FROM tbl_inquiry_confirm where confirm_to=:confirm_to");
    $stmtSelect->bindParam(':confirm_to',$userId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}

function getConfirmByConfirmId($conn, $confirmId){
    $stmtSelect = $conn->prepare("SELECT * FROM tbl_inquiry_confirm where confirm_id=:confirm_id");
    $stmtSelect->bindParam(':confirm_id',$confirmId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}

function getAllConfirmedInquiries($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tbl_inquiry_confirm");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}

function deleteConfirmedInquiryByProId($conn, $pro_id){
    $stmtdelete=$conn->prepare("DELETE FROM tbl_inquiry_confirm WHERE confirm_pro_id=:pro_id");
    $stmtdelete->bindParam(':pro_id', $pro_id);
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}

function deleteConfirmedInquiry($conn, $confirm_id){
    $stmtdelete=$conn->prepare("DELETE FROM tbl_inquiry_confirm WHERE confirm_id=:confirm_id");
    $stmtdelete->bindParam(':confirm_id', $confirm_id);
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}