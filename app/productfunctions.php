<?php
function insertProductRequest($conn, $data){	
	$stmtinsert=$conn->prepare("INSERT INTO tbl_product_request (`pro_type`,`pro_name`,`pro_brand`,`pro_description`,`pro_price_offer`,`pro_requesting_user`) 
    VALUES (:pro_type, :pro_name, :pro_brand, :pro_description, :pro_price_offer, :pro_requesting_user)");
    $stmtinsert->bindParam(':pro_type', $data['pro_type']);
    $stmtinsert->bindParam(':pro_name', $data['pro_name']);
    $stmtinsert->bindParam(':pro_brand', $data['pro_brand']);
    $stmtinsert->bindParam(':pro_description', $data['pro_description']);
    $stmtinsert->bindParam(':pro_price_offer', $data['pro_price_offer']);
	$stmtinsert->bindParam(':pro_requesting_user', $_SESSION['user'] ['id']);
	if ($stmtinsert->execute()) {
		return true;
	}
	return false;
}
function updateProductRequest($conn, $data){
	$stmtupdate=$conn->prepare("UPDATE tbl_product_request SET pro_type=:pro_type, pro_name=:pro_name, pro_brand=:pro_brand,  pro_description=:pro_description, pro_price_offer=:pro_price_offer WHERE pro_id=:pro_id");

	$stmtupdate->bindParam(':pro_type', $data['pro_type']);
	$stmtupdate->bindParam(':pro_name', $data['pro_name']);
	$stmtupdate->bindParam(':pro_brand', $data['pro_brand']);
	$stmtupdate->bindParam(':pro_description', $data['pro_description']);
	$stmtupdate->bindParam(':pro_price_offer', $data['pro_price_offer']);
	$stmtupdate->bindParam(':pro_id', $data['pro_id']);
	if ($stmtupdate->execute()) {
		return true;
	}
	return false;
}
function getAllProductsRequest($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tbl_product_request");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function getProductRequestsByUserId($conn, $userId){
    $stmtSelect = $conn->prepare("SELECT * FROM tbl_product_request where pro_requesting_user=:pro_requesting_user");
    $stmtSelect->bindParam(':pro_requesting_user',$userId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function getProductRequestById($conn, $pro_id){
    $stmtSelect = $conn->prepare("SELECT * FROM tbl_product_request where pro_id=:pro_id");
    $stmtSelect->bindParam(':pro_id',$pro_id);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function deleteProductRequest($conn, $pro_id){
	$stmtdelete=$conn->prepare("DELETE FROM tbl_product_request WHERE pro_id=:pro_id");
	$stmtdelete->bindParam(':pro_id', $pro_id);
	if ($stmtdelete->execute()) {
		return true;
	}
	return false;
}
function deleteSpecificUserAllProductRequest($conn, $user_id){
	$stmtdelete=$conn->prepare("DELETE FROM tbl_product_request WHERE pro_requesting_user=:pro_requesting_user");
	$stmtdelete->bindParam(':pro_requesting_user', $user_id);
	if ($stmtdelete->execute()) {
		return true;
	}
	return false;
}