<?php
session_start();
include("db.php");
if (!isset($_SESSION["logged_in"])) {
	header("Location: /login.php");
	exit();
}
?>

<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Admin- My First PHP Website</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<a href="index.php" class="logo">Admin Feedback Viewer</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li><a href="index.php">Home</a></li>
							<li><a href="aboutme.php">About Me</a></li>
							<li><a href="login.php">Login</a></li>
							<li class="active"><a href="admin.php">Admin</a></li>
						</ul>
						<ul class="icons">
							<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<section class="post">
								<form method="post" action="/admin.php">
									<div class="fields">
										<div class="field">
											<label for="name">Search By Name</label>
											<input type="text" name="name" id="name" />
										</div>
									</div>
									<ul class="actions">
										<li><input type="submit" value="Search" /></li>
									</ul>
								</form>
								<div class="table-wrapper">
									<table>
										<thead>
											<tr>
												<th>Name</th>
												<th>Email</th>
												<th>Message</th>
											</tr>
										</thead>
										<tbody>
											<?php
												if (isset($_POST["name"])) {
													$name = $_POST["name"];
													$query_result = $db->query("SELECT name, email, message FROM feedback WHERE name = '$name'");
												} else {
													$query_result = $db->query("SELECT name, email, message FROM feedback");
												}

												while ($row = $query_result->fetchArray()) {
													$name = $row['name'];
													$email = $row['email'];
													$message = $row['message'];

													echo "<tr>";
													echo "<td>$name</td>";
													echo "<td>$email</td>";
													echo "<td>$message</td>";
													echo "</tr>";
												}
											?>
										</tbody>
									</table>
								</div>
							</section>

					</div>

				<!-- Copyright -->
					<div id="copyright">
						<ul><li>&copy; Untitled</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li></ul>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
