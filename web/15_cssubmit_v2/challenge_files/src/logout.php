<?php
session_start();
if (!isset($_SESSION["logged_in"])) {
	header("Location: /index.php");
	exit();
} else {
  session_unset();
  header("Location: /index.php");
	exit();
}
?>
