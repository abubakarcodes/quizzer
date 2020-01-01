<?php require'resources/database.php';?>
<?php session_start(); ?>


<?php
//check to see if the score is set
if( !isset($_SESSION['score'] ) ){
	 $_SESSION['score'] = 0;
}


if(isset($_POST['submit'])){
	$number = $_POST['number'];
	$selected_choice = $_POST['choice'];
	$next = $number+1;

	/**
	 * get total number of lines in table
	 */
	$query = "SELECT * FROM questions";
	$results = $conn->query($query);
	$total = $results->rowCount();



	/*
	* get Correct Choice
	*/

	$query = "SELECT * FROM choices WHERE question_number = $number AND is_correct = 1";

	//GET result
	$result = $conn->query($query) or die($conn->errorCode() . __line__);
	//get row
	$row = $result->fetch(PDO::FETCH_ASSOC);


	//set correct choice
	$correct_choice = $row['id'];


	if($correct_choice == $selected_choice){
		//answer is correct
		 $_SESSION['score']++;
	}

	//check if the last question
	if ($number == $total) {
		header("location: final.php");
		exit();
	}else{
		header("location: questions.php?n=" . $next);
	}


   }


 ?>