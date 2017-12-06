<?php
session_start();

session_unset();
header('Location: sample_input_1.html');
exit();
?>
