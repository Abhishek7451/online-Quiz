<?php
include 'db.php';

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM questions";
$result = mysqli_query($connection, $query);

if ($result === false) {
    die("Error executing query: " . mysqli_error($connection));
}

$total_questions = mysqli_num_rows($result);
?>
<html>
<head>
    <title>PHP Quizzer</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<header>
    <div class="container">
        <p>PHP Quizzer</p>
    </div>
</header>

<main>
    <div class="container">
        <h2>Test Your PHP Knowledge</h2>
        <p>This is a multiple choice quiz to test Your PHP Knowledge.</p>
        <ul>
            <li><strong>Number of Questions:</strong> <?php echo $total_questions; ?></li>
            <li><strong>Type:</strong> Multiple Choice</li>
            <li><strong>Estimated Time:</strong> <?php echo $total_questions * 1.5; ?> minutes</li>
        </ul>

        <a href="questions.php?n=1" class="start">Start Quiz</a>
    </div>
</main>
</body>
</html>
