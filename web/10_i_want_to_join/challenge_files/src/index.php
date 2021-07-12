<html>
  <head>
    <title>🚫💃 The Anti Social Society 🕺🚫</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <style>
      h1 {text-align: center;}
      h3 {text-align: center;}
      p {text-align: center;}
      div {text-align: center;}
      ul {text-align: center;}
      li {text-align: center;}
    </style>
  </head>

  <body style="background-color:powderblue;">
    <header>
      <h1>🚫💃 The Anti Social Society 🕺🚫</h1>
      <p>Who does not hate going outside and talking to other human beings?</p>
      <p>It is disgusting how some people can spend time with each other and form this weird thing called <i>friendships</i> (ewwww 🤮)</p>
      <p>We have decided to fight against these social people and form the</p>
      <p><b>Anti Social Society (ASS)</b></p>
      <p>If you want to join ASS today please fill in the form below and we will get in contact with you about what we have planned!</p>
    </header>

    <br>
    
    <?php
      if (isset($_POST) and !empty($_POST["email"])) {
        $email = $_POST["email"];
        echo "<p>Thank you for joining ASS!</p>";
        echo "<p>We will send you information about our club to $email soon!</p>";
        echo "<p>CTF{wHy_0n_3aRtH_w0vLd_a_cLuB_g1ve_th3m5eLv3s_tH4t_n4m3??!?}</p>";
      }
      else {
        echo "<p>Due to the excessive number of people wanting to join, we have decided to disable signing up to our society.</p>";
        echo "<p>This is because too many people joining ASS goes against our core beliefs.</p>";
        echo "<p>We are sorry if this upsets anyone.</p>";
        echo '<br>';
        echo '<ul style="list-style-type:none;">';
        echo '<form method="post">';
        echo '<li><h3>Sign Up Form</h3></li>';
        echo '<li><input type="email" placeholder="Email Address" name="email" value=""></li>';
        echo '<li><input type="submit" value="Join ASS" disabled></li>';
        echo '</form>';
        echo '</u>';
      }
    ?>
  </body>
</html>
