<?php
include 'db.php';

$query = "SELECT * FROM questions";
$result = mysqli_query($connection, $query);
$total_questions = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Quizzer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <div class="container">
        <p>PHP Quizzer</p>
    </div>
</header>
<main>
    <div class="container">
        
		<a href="main.php" class="button">Take Quiz</a>
		<a href="add.php" class="button">Add questions</a>
    </div>
</main>
</body>
</html>
