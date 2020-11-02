<?php
function insertSealedDealByProId($conn, $proId){	
    $product=getProductRequestById($conn, $proId);
    $buying_user_id=$_SESSION['user'] ['id'];
	$stmtinsert=$conn->prepare("INSERT INTO tbl_sealed_deal (`sealed_pro_name`,`sealed_buyer_id`) 
    VALUES (:sealed_pro_id,:sealed_buyer_id)");
    $stmtinsert->bindParam(':sealed_pro_id', $product['pro_name']);
    $stmtinsert->bindParam(':sealed_buyer_id', $buying_user_id);
    
	if ($stmtinsert->execute()) {
		return true;
	}
	return false;
}

function getAllSealedDeal($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tbl_sealed_deal");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}

function deleteSealedDealProductRequest($conn, $pro_id){
    $stmtdelete=$conn->prepare("DELETE FROM tbl_product_request WHERE pro_id=:pro_id");
    $stmtdelete->bindParam(':pro_id', $pro_id);
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}