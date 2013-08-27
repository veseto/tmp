<?php
	include('header.php');
	if (!isset($_SESSION["uid"])) {
		header('Location: index.php');
	}
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Binar tree</title>

<!-- CSS Files -->
<link type="text/css" href="js/Jit/Examples/css/base.css" rel="stylesheet" />
<link type="text/css" href="js/Jit/Examples/css/Spacetree.css" rel="stylesheet" />

<!--[if IE]><script language="javascript" type="text/javascript" src="../../Extras/excanvas.js"></script><![endif]-->

<!-- JIT Library File -->
<script language="javascript" type="text/javascript" src="js/Jit/jit.js"></script>
<script language="javascript" type="text/javascript" src="js/validation/lib/jquery.js"></script>

<!-- Example File -->
<script language="javascript" type="text/javascript" src="visualizationBinar.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/validation/jquery.validate.js"></script>
</head>

<body onload="init();">
<div id="defaultCountdown" ></div>
<div id="center-container">
    <div id="infovis"></div>    
</div>
<input type="checkbox" id="s-normal" name="selection" checked="checked" value="normal" />
<div id="log"></div>
</body>
</html>
