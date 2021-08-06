<?php
require "db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST["type"])) {
    $conn = getDBConn();

    if ($_POST['type'] === 'login') {
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
        header("Location: /units.php");
        exit();
      } else {
        echo "<p><b>Invalid username or password!</b></p><br />";
      }

    } elseif ($_POST['type'] === 'register') {
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

        $_SESSION['logged_in'] = True;
        $_SESSION['name'] = $name;
        header("Location: /units.php");
        exit();
      }
    }

    $conn->close();
  }
}
?>
