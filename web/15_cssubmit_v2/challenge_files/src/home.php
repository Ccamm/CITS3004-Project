<?php
session_start();
if (!isset($_SESSION["logged_in"])) {
	header("Location: /index.php");
	exit();
}
?>

<html>
  <head>
    <title>cssubmit v2.0 - ~/home</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>

  <body>
    <div id="outer">
      <h1>cssubmit v2.0 - ~/home</h1>
      <div id="inner">

        <?php
        require "db.php";
        echo "<h2>".$_SESSION["name"]."'s Units</h2>";

				echo "<form action='/logout.php'>";
				echo "<input type='submit' value='Logout'>";
				echo "</form>";

        $email = $_SESSION['email'];
        $conn = getDBConn();
        if ($conn->connect_error) {
          echo "<p><b>Failed to connect to backend!</b></p><br />";
        } else {
          $stmt = $conn->prepare("SELECT unit FROM userunits WHERE email = ?");
          $stmt->bind_param("s", $email);
          $stmt->execute();
          $units_result = $stmt->get_result();

          while($unit_row = $units_result->fetch_assoc()) {
            $unit = $unit_row['unit'];

            echo "<h3>".$unit."</h3>";

            echo "<table id='assignments'>";
            echo "<tr><th>Assignment</th><th>Description</th><th>Duedate</th><th>Your Submission</th><th>Submit</th></tr>";
            $assignment_stmt = $conn->prepare("SELECT assignment, description, duedate FROM assignments WHERE unit = ?");
            $assignment_stmt->bind_param("s", $unit);
            $assignment_stmt->execute();
            $assignments_result = $assignment_stmt->get_result();

            while($assignment_row = $assignments_result->fetch_assoc()) {
              $assignment = $assignment_row['assignment'];
              $description = $assignment_row['description'];
              $duedate = $assignment_row['duedate'];

              echo "<tr>";
              echo "<td width='20%'><b>".$assignment."</b></td>";
              echo "<td width='20%'>".$description."</td>";
              echo "<td width='10%'>".$duedate."</td>";

							$submission_stmt = $conn->prepare("SELECT uploadedfile FROM usersubmissions WHERE email = ? AND unit = ? AND assignment = ?");
							$submission_stmt->bind_param("sss", $email, $unit, $assignment);
							$submission_stmt->execute();
							$submission_stmt->bind_result($uploadedfile);
							$submission_stmt->store_result();
							$submission_stmt->fetch();
							$submission_stmt->close();

              if (!isset($uploadedfile)) {
                echo "<td width='20%'><b>You have not submitted any files</b></td>";
              } else {
                echo "<td width='20%'><a href='".$uploadedfile."'>View your submission</a></td>";
								unset($uploadedfile);
              }
              echo "<td width='30%'>";
              echo "<form action='/submit.php?unit=".$unit."&assignment=".$assignment."' method='post' enctype='multipart/form-data'>";
              echo "<input type='file' name='submission'>";
              echo "<input type='submit' name='Submit' value='Submit' placeholder='Submit'>";
              echo "</form>";
              echo "</td>";
            }
            $assignment_stmt->close();
            echo "</table>";
          }
          $stmt->close();
        }
        $conn->close();
        ?>

      </div>
    </div>

    <div id="particles-js"></div>
    <script src="/assets/js/particles.min.js"></script>
    <script src="/assets/js/main.js"></script>
  </body>
</html>
