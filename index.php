<?php 
require'resources/database.php';
/*
* Get the Number of lines
 */
$query = "SELECT * from questions";
$result =  $conn->query($query);
$total = $result->rowCount();

 ?>



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
			<h2>Test Your PHP Knowledge</h2>
			<p>This is a Multiple Choice to test your PHP knowledge</p>
			<ul>
				<li><b>Number of Questions:</b> <?php echo $total; ?></li>
				<li><b>Type:</b> Multiple Choices</li>
				<li><b>Estimated Time:</b> <?php echo $total * .5; ?> Minutes</li>

			</ul>
			<a href="questions.php?n=1" class="start">Start Your Quiz</a>
		</div>
	</main>
	<footer>
		<div class="container">
			copy Right &copy; 2014 PHP Quizzer
		</div>
	</footer>
</body>
</html>