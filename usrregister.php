<?php
	session_start();
	include("connection.php");
	include("constants.php");
	$email = $_POST['email'];
	$password = $_POST['password'];
	$refferal = $_SESSION['ref'];
	$message = "";
	if (isset($_POST['refMail']) && $_POST['refMail'] != "") {
		$refferal = $mysqli->query("SELECT userId From user where email='".$_POST['refMail']."'")->fetch_array()['userId'];
		$_SESSION['ref'] = $refferal;
	}
	if (!empty($email) && !empty($password)) {
		$password = $mysqli->real_escape_string($password);
		$email = $mysqli->real_escape_string($email);
		$q="SELECT COUNT(userId) FROM user where email='$email'";
		$count = $mysqli->query($q)->fetch_array()[0];
		if ($count === NULL || $count === '0') {
			$q1 = "INSERT INTO user (email, password, refferal, activated, binar) Values ('$email','".sha1($password)."', $refferal, 0, 0)";
			$mysqli -> query($q1);
			$userId=$mysqli->insert_id;
			$subject = "Confirm registration";
			$headers = "From: wpopowa@gmail.com\r\nX-Mailer: php";

			$mailBody = "To confirm your account please follow the link: ".$url."/confirm.php?id=".sha1('firstrandomstring'.$email.'secondrandomstring')."\nYour password is $password";
			mail($email,$subject,$mailBody,$headers);
			$_SESSION['msg'] = "Registration successful!";
			header('Location: index.php');
			exit;
		} else {
			$_SESSION['msg'] = "Email in use";
			header('Location: register.php');
			exit;
		}
	} else {
		$message = "Registration failed";
		header('Location: register.php');
	}
?>