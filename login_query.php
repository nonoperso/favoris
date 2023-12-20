<?php
	session_start();
	require_once 'conn.php';
	
	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$query = "SELECT COUNT(*) as count FROM `member` WHERE `username` = :username AND `password` = :password";
		//$query = "SELECT COUNT(*) as count,password,association FROM `member` WHERE `password` = :password";
		//$query = "SELECT COUNT(*) as count FROM `member` WHERE `password` = :password";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
		$row = $stmt->fetch();
		
		$count = $row['count'];

		if($count > 0){			
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['association'] = $row[2];
			
			header('location:selection.php');
		}else{
			$_SESSION['error'] = "Prénom ou Mot de passe inconnu, réessayer";
			header('location:index.html');
		}
	}
?>