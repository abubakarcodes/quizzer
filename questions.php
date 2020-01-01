<?php require'resources/database.php'; ?>
<?php session_start(); ?>

<?php
/*
* Get the Number of lines
 */
$query = "SELECT * from questions";
$result =  $conn->query($query);
$total = $result->rowCount();



//set question number
$number = (int) $_GET['n'];
//create query to get question
$query = "SELECT * from questions WHERE question_number = $number";
//getting result
$result = $conn->query($query) or die($conn->errorCode(). __LINE__);
$question =$result->fetch(PDO::FETCH_ASSOC);



/*
 * GET choices
 */
//create query to get choice
$query = "SELECT * from choices WHERE question_number = $number";
//getting choices
$choices = $conn->query($query) or die($conn->errorCode(). __LINE__);

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
			<div class="current">
				Question <?php echo $question['question_number']; ?> of <?php  echo $total;?>
			</div>
			<p class="question"><b><?php echo $question['question_text']; ?></b></p>
			<form action="process.php" method="post" accept-charset="utf-8">
				<ul class="choices">
					<?php while( $row = $choices->fetch(PDO::FETCH_ASSOC) ): ?>
						<li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"><?php echo $row['choice_text']; ?></li>
					<?php endwhile;  ?>
				</ul>
				<input type="submit" name="submit" value="submit">
				<input type="hidden" name="number" value="<?php echo $number ?>">
			</form>
		</div>
	</main>
	<footer>
		<div class="container">
			copy Right &copy; 2014 PHP Quizzer
		</div>
	</footer>
</body>
</html>