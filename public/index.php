<?php

if (isset($_POST["send"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $body = $_POST["body"];
  
  $errors = array();
  
  $email_matcher = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*" .
  "@" .
  "[a-z0-9-]+" .
  "(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
  
  if (preg_match($email_matcher, $email) == 0) {
    array_push($errors, "You did not enter a valid email address");
  }  

  if (count($errors) == 0) {
    $to = "xxxx@xxxxx.com"; // your email
    $subject = "[Generated from drinkatpuzles.com] " . $subject;
    
    $from = $name . " <" . $email . ">";
    $headers = "From: " . $from;
    
    if (!mail($to, $subject, $body, $headers)) {
      array_push($errors, "Mail failed to send.");
    }
    else {
      $email_sent = true;
    }
    
  }

}

?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Puzzles Bar</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="stylesheets/base.css">
	<link rel="stylesheet" href="stylesheets/skeleton.css">
	<link rel="stylesheet" href="stylesheets/layout.css">
	<link rel="stylesheet" href="stylesheets/style.css">
  <link rel="stylesheet" href="stylesheets/clear.css" type="text/css" media="screen and (max-width: 959px)">
	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

</head>
<body>



	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

	<div class="container">
		<div class="sixteen columns">
      <h1>Puzzles</h1>
      <hr />
		</div>
    <div id="specials" class="four columns">
      <h3>Daily Drink Specials</h3>
      <ul>
        <li><span class="day">Monday</span> $2.00 Long Islands</li>
        <li><span class="day">Tuesday</span> $3.00 Pitchers of Grainbelt</li>
        <li><span class="day">Wednesday</span> $2.00 Rail Mixers</li>
        <li><span class="day">Thursday</span> Bro's Night - $3 Appletinis</li>
        <li><span class="day">Friday</span> $1 Bottles of High Life, just for CJ</li>
        <li><span class="day">Saturday</span> $2 Domestic Taps</li>
        
      </ul>
    </div>
    <div id="main" class="eight columns">
      <h2>The Classiest Bar in the College District.</h2>
      <img src="images/bar.jpg" class="scale-with-grid">
      <p>
        Whether you want to catch this week's game 
        or just want to chill with your bros, We've 
        got the drink specials and the atmosphere
        you know and love.
      </p>

      <?php if (isset($email_sent)) : ?>

        <p>Thanks for your email! We'll be in contact with you shortly.</p>

      <?php else : ?> 

        <h2>Contact Us</h2>

        <form action="index.php" method="post">
          <?php if (count($errors) > 0) : ?>
            <h3>There were errors that prevented the email from sending</h3>

            <ul class="errors">
              <?php foreach($errors as $error) : ?>
                <li><?php echo $error; ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        
          <label for="name">Name</label>
          <input type="text" name="name">
        
          <label for="email">Your Email</label>
          <input type="text" name="email">
        
          <label for="subject">Subject</label>
          <input type="text" name="subject" 
                value="Sign up for drink specials">
        
          <label for="body">Body</label>
          <textarea name="body"></textarea>

          <input type="submit" name="send" value="Send">

        </form>

      <?php endif; ?>
    </div>

    <div id="sponsors" class="four columns">
      <img src="images/nfl.jpg">
      <img src="images/vikings.jpg">
      <img src="images/wild.gif">
      <img src="images/nhl.gif">
      <img src="images/um.gif">
      
    </div>

    <div class="sixteen columns">
      <h5>Copyright &copy; 2011 Puzzles</h5>
    </div>

	</div><!-- container -->



	<!-- JS
	================================================== -->
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="javascripts/tabs.js"></script>

<!-- End Document
================================================== -->
</body>
</html>
