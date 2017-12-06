<?php
session_start();

if ($_POST['my_id'] == 'null' && $_POST['password'] == 'void') {
		$_SESSION['my_id'] = $_POST['my_id'];
		$_SESSION['password'] = $_SESSION['password'];
	} else {
		
		header('Location: error.php');
}
?>

...
<p>welcome!<?php  
echo htmlspecialchars($_SESSION['my_id']); ?>!!</p>
<p><a href="./sample_login_2.php">next page</a></p>
