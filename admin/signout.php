<?php
session_start();
require_once("config.php");
session_destroy();?>
	<script>
	alert("Logged Out Successfully");
	window.location.href = "signin.php";
	</script>