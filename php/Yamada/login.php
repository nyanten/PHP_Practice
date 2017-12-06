<?php
session_start();

if ($_POST['my_id'] == 'root' && $_POST['password'] == 'root00') {
		$_SESSION['my_id'] = $_POST['my_id'];
		$_SESSION['password'] = $_SESSION['password'];
		header('Location: logon.php');
	} else {
		// error jump
		header('Location: error.php');
}
?>


