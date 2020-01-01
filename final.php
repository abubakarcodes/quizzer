<?php 
require'resources/database.php';?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PHP Quizzer</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<div class="container">
			<h1>PHP Quizzer</h1>
		</div>
	</header><!-- /header -->
	<main>
		<div class="container">
			<h2>You have Done !</h2>
			<p style='color:green;'>Congratulations! You have done your test</p>
			<p  style='color:green;'>Final Score: <?php echo $_SESSION['score']; ?></p>
			<a href="questions.php?n=1" class="start">Start Again!</a>
	</main>
	<footer>
		<div class="container">
			copy Right &copy; 2014 PHP Quizzer
		</div>
	</footer>
</body>
</html>