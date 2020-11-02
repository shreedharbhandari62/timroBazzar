<?php
function insertUser($conn, $data){
	$data['user_password']=md5($data['user_password']);
	$stmtinsert=$conn->prepare("INSERT INTO tbl_userlogin (`user_fname`,`user_lname`,`user_email`,`user_username`,`user_password`,`user_address`, `user_phone`) VALUES (:user_fname, :user_lname, :user_email, :user_username, :user_password, :user_address, :user_phone)");

	$stmtinsert->bindParam(':user_fname', $data['user_fname']);
	$stmtinsert->bindParam(':user_lname', $data['user_lname']);
	$stmtinsert->bindParam(':user_email', $data['user_email']);
	$stmtinsert->bindParam(':user_username', $data['user_username']);
	$stmtinsert->bindParam(':user_password', $data['user_password']);
	$stmtinsert->bindParam(':user_address', $data['user_address']);
	$stmtinsert->bindParam(':user_phone', $data['user_phone']);
	if ($stmtinsert->execute()) {
		return true;
	}
	return false;
}
function updateUser($conn, $data){
	$stmtupdate=$conn->prepare("UPDATE tbl_userlogin SET user_fname=:user_fname, user_lname=:user_lname, user_email=:user_email, user_username=:user_username, user_address=:user_address, user_phone=:user_phone WHERE user_id=:user_id");

	$stmtupdate->bindParam(':user_fname', $data['user_fname']);
	$stmtupdate->bindParam(':user_lname', $data['user_lname']);
	$stmtupdate->bindParam(':user_email', $data['user_email']);
	$stmtupdate->bindParam(':user_username', $data['user_username']);
	$stmtupdate->bindParam(':user_address', $data['user_address']);
	$stmtupdate->bindParam(':user_phone', $data['user_phone']);
	$stmtupdate->bindParam(':user_id', $data['user_id']);
	if ($stmtupdate->execute()) {
		return true;
	}
	return false;
}
function getAllUsers($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tbl_userlogin");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function getUserById($conn, $userId){
    $stmtSelect = $conn->prepare("SELECT * FROM tbl_userlogin where user_id=:user_id");
    $stmtSelect->bindParam(':user_id',$userId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function getUserInfoByUsername($conn, $user_userName){
    $stmtSelect = $conn->prepare("SELECT *  FROM tbl_userlogin where user_username =:user_username ");					
    $stmtSelect->bindParam(':user_username',$user_userName);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function deleteUser($conn, $userId){
	$stmtdelete=$conn->prepare("DELETE FROM tbl_userlogin WHERE user_id=:user_id");
	$stmtdelete->bindParam(':user_id', $userId);
	if ($stmtdelete->execute()) {
		return true;
	}
	return false;
}