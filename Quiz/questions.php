<?php
include 'db.php';
session_start();

// Set Question Number
$number = isset($_GET['n']) ? intval($_GET['n']) : 1; // Sanitize input

// Query for the Question
$query = "SELECT * FROM questions WHERE question_number = $number";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Error executing query: " . mysqli_error($connection));
}

$question = mysqli_fetch_assoc($result);
if (!$question) {
    die("Question not found.");
}

// Get choices
$query = "SELECT * FROM options WHERE question_number = $number";
$choices = mysqli_query($connection, $query);
if (!$choices) {
    die("Error executing query: " . mysqli_error($connection));
}

// Get Total questions
$total_questions = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM questions"));
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
        <div class="current">Question<?php echo $number; ?> of <?php echo $total_questions; ?></div>
        <p class="question"><?php echo $question['question_text']; ?></p>
        <form method="POST" action="process.php">
            <ul class="choices">
                <?php while ($row = mysqli_fetch_assoc($choices)) { ?>
                    <li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"><?php echo $row['coption']; ?></li>
                <?php } ?>
            </ul>
            <input type="hidden" name="number" value="<?php echo $number; ?>">
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</main>
</body>
</html>
