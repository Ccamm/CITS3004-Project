<?php
require 'db.php';

session_start();
if (isset($_SESSION["logged_in"])) {
  header("Location: /home.php");
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
    <div id="sidebar">
      <h1>cssubmit v2.0</h1>
      <img src='/images/uwalogo.png' id='siderbar-logo'/>
      <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          if (isset($_POST["type"])) {
            $conn = getDBConn();
            if ($conn->connect_error) {
              echo "<p><b>Failed to connect to backend!</b></p><br />";
            } elseif ($_POST['type'] === 'Login') {
              $email = $_POST["email"];
              $pass = $_POST["password"];
              $stmt = $conn->prepare("SELECT name, password FROM users WHERE email = ?");
              $stmt->bind_param("s", $email);
              $stmt->execute();

              $stmt->bind_result($name, $pass_chk);
              $stmt->store_result();
              $stmt->fetch();
              $stmt->close();

              if (!isset($pass_chk)) {
                echo "<p><b>Invalid username or password!</b></p><br />";
              } elseif (password_verify($pass, $pass_chk)) {
                $_SESSION['logged_in'] = True;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header("Location: /home.php");
                exit();
              } else {
                echo "<p><b>Invalid username or password!</b></p><br />";
              }

            } elseif ($_POST['type'] === 'Register') {
              $name = $_POST["name"];
              $email = $_POST["email"];
              $pass = password_hash($_POST["password"], PASSWORD_BCRYPT);

              $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
              $stmt->bind_param("s", $email);
              $stmt->execute();
              $result = $stmt->get_result();

              if ($result->num_rows !== 0) {
                echo "<p><b>An account has already been created with that email!</b></p><br />";
              } else {
                $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $name, $email, $pass);
                $stmt->execute();
                $stmt->close();

                $stmt = $conn->prepare("INSERT INTO userunits (email, unit) VALUES (?, 'CITS3004')");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->close();

                $stmt = $conn->prepare("INSERT INTO userunits (email, unit) VALUES (?, 'CITS1003')");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->close();

                $_SESSION['logged_in'] = True;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header("Location: /home.php");
                exit();
              }
              $stmt->close();
            }

            $conn->close();
          }
        }
      ?>
      <ul class="nav nav-pills nav-justified">
        <li class="active"><a data-toggle="tab" href="#login">Login</a></li>
        <li><a data-toggle="tab" href="#register">Register</a></li>
      </ul>


      <div class="tab-content">
        <div id="login" class="tab-pane fade in active">
          <br />
          <form action="/index.php" method="post">
            <input type="email" placeholder="Student Email" name="email" ><br />
            <input type="password" placeholder="Password" name="password" ><br />
            <input type="submit" placeholder="Login" value="Login" name="type" ><br />
          </form>
        </div>
        <div id="register" class="tab-pane fade">
          <h3>Registration has been disabled during development phase!</h3>
          <p>If you are a developer please contact the admin team to get the developer credentials.</p><br />
          <form action="/index.php" method="post">
            <input type="text" placeholder="Name" name="name" ><br />
            <input type="email" placeholder="Student Email" name="email" ><br />
            <input type="password" placeholder="Password" name="password" ><br />
            <input type="submit" placeholder="Register" value="Register" name="type" disabled ><br />
          </form>
        </div>
      </div>
    </div>

    <div id="particles-js"></div>
    <script src="/assets/js/particles.min.js"></script>
    <script src="/assets/js/main.js"></script>
  </body>
</html>
