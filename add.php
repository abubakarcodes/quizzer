<?php 
require'resources/database.php';




if(isset($_POST['submit'])){
	//get post variables
	$question_number = $_POST['question_number'];
	$question_text = $_POST['question_text'];
	$correct_choice = $_POST['correct_choice'];


	//get post variables for choices
	$choices = array();
	$choices[1] = $_POST['choice1'];
	$choices[2] = $_POST['choice2'];
	$choices[3] = $_POST['choice3'];
	$choices[4] = $_POST['choice4'];
	$choices[5] = $_POST['choice5'];

	//question query
	$query = "INSERT INTO questions (question_number , question_text)
			  VALUES 				('$question_number' , '$question_text')";

	//Run query
	$insert_row = $conn->query($query) or die(errorCode() . __LINE__);

	//validate insert 
	if ($insert_row) {
		foreach($choices as $choice => $value){
			if( !empty($value) )
			{ 
				if($correct_choice == $choice){
				    $is_correct = 1;

					}else{
					  $is_correct = 0;
					}
				

			//choice query
			$query = "INSERT INTO choices ( question_number , is_correct , choice_text )
						VALUES            ( '$question_number' , '$is_correct' , '$value' )";
			$result = $conn->query($query) or die("Error:" . $conn->errorCode() . __LINE__ );
			//validate insert 
			if(isset($result))
			{
				continue;
			}else{
				  die ("Error:" . $conn->errorCode() . $conn->errorInfo() );
 			}
		}
	}
		$msg = "Question has been added";
	}
}

//get number of total question
$query = "SELECT * from questions";
$result =  $conn->query($query);
$total = $result->rowCount();
$next = $total+1;

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
			<h2>Add a Question</h2>
			<?php if (isset($msg)) {
				echo "<p style='color:red;'>$msg</p>";
			} ?>
			<form action="add.php" method="post" accept-charset="utf-8">
				<p>
					<label for="question_number">Question Number: </label>
					<input type="number" value="<?php echo $next; ?>" name="question_number">

				</p>

				<p>
					<label for="question_text">Question text: </label>
					<input type="text" name="question_text">
				</p>
				<p>
					<label for="choice1">Choice #1: </label>
					<input type="text" name="choice1">
				</p>
				<p>
					<label for="choice2">Choice #2: </label>
					<input type="text" name="choice2">
				</p>
				<p>
					<label for="choice3">Choice #3 </label>
					<input type="text" name="choice3">
				</p>
				<p>
					<label for="choice4">Choice #4: </label>
					<input type="text" name="choice4">
				</p>
				<p>
					<label for="choice5">Choice #5: </label>
					<input type="text" name="choice5">
				</p>
				<p>
					<label for="correct_choice">Correct Choice Number: </label>
					<input type="number" name="correct_choice">
				</p>
				<p>
					<input type="submit" name="submit" value="submit">
				</p>

			</form>
	</main>
	<footer>
		<div class="container">
			copy Right &copy; 2014 PHP Quizzer
		</div>
	</footer>
</body>
</html>