<!DOCTYPE html>
<?php
$error = NULL;

if (isset($_POST["send"])) {

  $email=$_POST["email"];
  $subject=$_POST["subject"];
  $body=$_POST["body"];

  $email_matcher = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*" .
    "@" .
    "[a-z0-9-]+" .
    "(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
  if (preg_match($email_matcher, $email) == 0) {
    $error = "you did not enter a valid email address";
  }

  if (is_null($error)) {
    $to = "philippe.bourgau@agileavatars.com";
    $subject = "[Interested by AgileAvatars.com] " . $subject;
    $from = $email;
    $headers = "From: " . $from;
    if (!mail($to, $subject, $body, $headers)) {
      $error = "the mail failed to send.";
    }
  }
}
else {
  $body="Please keep me up to date about www.agileavatars.com";
}
?>
<html>
  <head>
    <title>AgileAvatars.com</title>

    <meta name="keywords" content="custom, agile, avatars, magnet, order" />
    <meta name="description" content="A store where to order customized agile avatar magnets" />
    <meta name="author" content="Philippe Bourgau" />

    <link rel="stylesheet" href="stylesheets/normalize.css" type="text/css" />
    <link rel="stylesheet" href="stylesheets/index.css" type="text/css" />

    <link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet" type="text/css" />

  </head>
  <body>

    <header>
      <h1>AgileAvatars.com</h1>
    </header>

    <div id="container">

      <section id="content">
        <p id="summary">Tired of post-its falling from your agile or kanban whiteboard ? Order your own customized avatar magnets.</p>

        <form action="index.php" method="post">
          <ol>
            <li>
              <label for="email">Email</label>
              <input type="text" name="email" placeholder="Enter your email" title="Enter your email if you are interested"/>
            </li>
            <li>
              <label for="subject">Title</label>
              <input type="text" name="subject" value="I am interested by www.agileavatars.com" title="Customize your subject if you want"/>
            </li>
            <li>
              <label for="body">Message</label>
              <textarea name="body" title="Customize message if you want"/><?php echo $body; ?></textarea>
            </li>
            <li>
              <input type="submit" name="send" value="I am interested" onClick="_gaq.push(['_trackEvent', 'Contact', 'Interested',,, false]);"/>
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
      <ul id="social">
        <li id="twitter">
          <a href="http://twitter.com/share" class="twitter-share-button" data-url="http://www.agileavatars.com" data-via="pbourgau" data-counturl="http://www.agileavatars.com" >Tweet</a>
          <script type="text/javascript">
            (function(){
              var twitterWidgets = document.createElement('script');
              twitterWidgets.type = 'text/javascript';
              twitterWidgets.async = true;
              twitterWidgets.src = 'http://platform.twitter.com/widgets.js';
              document.getElementsByTagName('head')[0].appendChild(twitterWidgets);
            })();
          </script>
        </li>
        <li id="linkedin">
          <script src="//platform.linkedin.com/in.js" type="text/javascript">
            lang: en_US
          </script>
          <script type="IN/Share" data-url="http://www.agileavatars.com" data-counter="right"></script>
        </li>
        <li id="google-plus">
          <div class="g-plusone" data-size="medium"></div>
          <script type="text/javascript">
            (function() {
              var script = document.createElement('script'); script.type = 'text/javascript'; script.async = true;
              script.src = 'https://apis.google.com/js/plusone.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(script, s);
            })();
          </script>
        </li>
        <li id="facebook">
          <div class="fb-like" data-href="http://www.agileavatars.com" data-send="true" data-layout="button_count" data-width="150" data-show-faces="true"></div>
          <div id="fb-root"></div>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
          </script>
        </li>
      </ul>

      <p>An idea by <a href="http://philippe.bourgau.net">Philippe Bourgau</a> - 2013</p>
    </footer>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-42546181-1', 'agileavatars.com');
      ga('send', 'pageview');
    </script>

  </body>
</html>
