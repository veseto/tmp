<?php
	//tesst
	include('header.php');
	if (!isset($_SESSION["uid"])) {
		header('Location: index.php');
	}
?>
	<div id="payment" class="input-group">
		<form class="form-signin" method="post" action="usrpay.php" id="payForm">
			<input type="radio" name="group1" value="5" class="input-block-level"> Binar position
	        <button class="btn btn-primary btn-block" type="submit">Pay</button>
		</form>
	</div>
<?php
	include("footer.php");
?>
