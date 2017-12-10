<?php
foreach($_REQUEST['menu'] as $reserve) {
	print(htmlspecialchars($reserve, ENT_QUOTES) . '<br />');
	
}
?>


