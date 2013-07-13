<!DOCTYPE html>
<?php
$error = NULL;

if (isset($_POST["send"])) {

  $email=$_POST["email"];

  $email_matcher = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*" .
    "@" .
    "[a-z0-9-]+" .
    "(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
  if (preg_match($email_matcher, $email) == 0) {
    $error = "you did not enter a valid email address";
  }

  if (is_null($error)) {
    $to = "philippe.bourgau@gmail.com";
    $subject = "[Interested by AgileAvatars.com]";
    $from = $email;
    $headers = "From: " . $from;
    if (!mail($to, $subject, $body, $headers)) {
      $error = "the mail failed to send.";
    }
  }
}
?>
<html>
  <head>
    <title>AgileAvatars.com</title>

    <meta name="keywords" content="custom, agile, avatars, magnet, order" />
    <meta name="description" content="A presentation about a future store where to order customized agile avatar magnets" />
    <meta name="author" content="Philippe Bourgau" />

    <link rel="stylesheet" href="stylesheets/normalize.css" type="text/css" />
    <link rel="stylesheet" href="stylesheets/index.css" type="text/css" />

    <link href="http://fonts.googleapis.com/css?family=Offside" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet" type="text/css" />

  </head>
  <body>

    <header>
      <h1>AgileAvatars.com</h1>
    </header>

    <div id="container">

      <section id="content">
        <p id="summary">Tired of post-its falling from your whiteboard ? Order your own customized avatar magnets.</p>

        <form action="index.php" method="post">
          <ol>
            <li>
              <input type="text" name="email" placeholder="Email" title="Enter your email if you are interested"/>
            </li>
            <li>
              <input type="submit" name="send" value="I am interested" />
            </li>
          </ol>
        </form>

        <?php if (!is_null($error)) { ?>

          <p class="feedback error">Sorry, but <?php echo $error ?></p>

        <?php } elseif (isset($_POST["send"])) { ?>

          <p class="feedback success">Thank you for your interest</p>

        <?php } ?>

      </section>

      <section id="illustration">
        <ol>
          <li><img src="images/me-small.png" /></li>
          <li><img src="images/smiley-small.png" /></li>
          <li><img src="images/dog-small.png" /></li>
        </ol>
      </section>

    </div>

    <footer>
      <p>An idea by <a href="http://philippe.bourgau.net">Philippe Bourgau</a> - 2013</p>
    </footer>

  </body>
</html>