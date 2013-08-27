<?php
ini_set("sendmail_form", "wpopowa@gmail.com");
$subject = "Confirm registration";
			$email = "wpopowa@gmail.com";
			$mailBody = "To confirm your account please follow the link: /confirm.php?id=".sha1('firstrandomstring'.$email.'secondrandomstring')."\nYour password is password";
			mail($email,$subject,$mailBody);
?>