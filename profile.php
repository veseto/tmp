<?php
	include('header.php');
	include('connection.php');
	include('constants.php');
	if (!isset($_SESSION["uid"])) {
		header('Location: index.php');
	}
?>
	<h4> Welcome <?php echo $_SESSION['email']?>. Would you like to see:</h4>
	<a href='visualizationBinar.php' class="btn btn-primary">Binar tree</a> or <a href='visualizationFree.php'  class="btn btn-default">Free tree</a> 
	<h3>refferal link </h3>
	<div class="alert alert-success"><?php echo $url;?>/register.php?ref=<?php echo $_SESSION['uid']; ?></div>
	<?php 
		$money = $mysqli->query("SELECT money from user where userId='".$_SESSION['uid']."'")->fetch_array()['money'];
		echo "Your current balance is $money euro";
	?>
<?php
	include("footer.php");
?>