<?php
session_start();
if (!isset($_SESSION["logged_in"]) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
	header("Location: /index.php");
	exit();
}
?>

<html>
  <head>
    <title>cssubmit v2.0</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>

  <body>
		<div id="submit-div">
			<?php
			require "db.php";

			$unit = $_GET['unit'];
			$assignment = $_GET['assignment'];

			$email = $_SESSION['email'];
			$conn = getDBConn();
			if ($conn->connect_error) {
				echo "<p><b>Failed to connect to backend!</b></p><br />";
			} else {
				$stmt = $conn->prepare("SELECT * FROM userunits WHERE email = ? AND unit = ?");
				$stmt->bind_param("ss", $email, $unit);
				$stmt->execute();
				$result = $stmt->get_result();
				if ($result->num_rows === 0) {
					header("Location: /home.php");
					exit();
				}
				$stmt->close();

				$file_name = $_FILES['submission']['name'];
				$tmp_name = $_FILES['submission']['tmp_name'];
				$file_type = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
				$new_file = end(explode("/", $tmp_name)).".".$file_type;
				move_uploaded_file($tmp_name, "./uploads/".$unit."/".$new_file);

				$upload_path = "/uploads/".$unit."/".$new_file;

				$stmt = $conn->prepare("SELECT uploadedfile FROM usersubmissions WHERE email = ? AND unit = ? AND assignment = ?");
				$stmt->bind_param("sss", $email, $unit, $assignment);
				$stmt->execute();
				$stmt->bind_result($prev_uploadedfile);
				$stmt->store_result();
				$stmt->fetch();
				$stmt->close();
				$prev_file = ".".$prev_uploadedfile;
				if (isset($prev_uploadedfile)) {
					unlink($prev_file);

					$stmt = $conn->prepare("UPDATE usersubmissions SET uploadedfile = ? WHERE email = ? AND unit = ? AND assignment = ?");
					$stmt->bind_param("ssss", $upload_path, $email, $unit, $assignment);
					$stmt->execute();
					$stmt->close();
				} else {

					$stmt = $conn->prepare("INSERT INTO usersubmissions (uploadedfile, email, unit, assignment) VALUES (?, ?, ?, ?)");
					$stmt->bind_param("ssss", $upload_path, $email, $unit, $assignment);
					$stmt->execute();
					$stmt->close();
				}
				echo "<h4>Your file has succesfully been uploaded <a href='".$upload_path."'>here</a>!</h4>";
			}
			$conn->close();
			?>
			<form action='/home.php'>
				<input type="submit" value='Back to Home'>
			</form>
		</div>
		<div id="particles-js"></div>
    <script src="/assets/js/particles.min.js"></script>
    <script src="/assets/js/main.js"></script>
	</body>
</html>
