<?php
include 'db.php';
session_start();

if (isset($_POST['submit'])) {
    $question_number = $_POST['question_number'];
    $question_text = $_POST['question_text'];
    $correct_choice = $_POST['correct_choice'];

    $choice = array(
        $_POST['choice1'],
        $_POST['choice2'],
        $_POST['choice3'],
        $_POST['choice4'],
        $_POST['choice5']
    );

    $query = "INSERT INTO questions (question_number, question_text) VALUES ($question_number, '$question_text')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        foreach ($choice as $option => $value) {
            if ($value != NULL) {
                $is_correct = ($correct_choice == $option + 1) ? 1 : 0;
                $query = "INSERT INTO options (question_number, is_correct, coption) VALUES ('$question_number', '$is_correct', '$value')";
                mysqli_query($connection, $query);
            }
        }
        $message = "Question has been added successfully.";
    }
}

$query = "SELECT * FROM questions";
$questions = mysqli_query($connection, $query);
$total = mysqli_num_rows($questions);
$next = $total + 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add A Question</title>
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
        <h2>Add A Question</h2>
        <?php if (isset($message)) echo "<h4>$message</h4>"; ?>
        <form method="POST" action="add.php">
            <p>
                <label>Question Number:</label>
                <input type="number" name="question_number" value="<?php echo $next; ?>">
            </p>
            <p>
                <label>Question Text:</label>
                <input type="text" name="question_text">
            </p>
            <p>
                <label>Choice 1:</label>
                <input type="text" name="choice1">
            </p>
            <p>
                <label>Choice 2:</label>
                <input type="text" name="choice2">
            </p>
            <p>
                <label>Choice 3:</label>
                <input type="text" name="choice3">
            </p>
            <p>
                <label>Choice 4:</label>
                <input type="text" name="choice4">
            </p>
            <p>
                <label>Choice 5:</label>
                <input type="text" name="choice5">
            </p>
            <p>
                <label>Correct Option Number:</label>
                <input type="number" name="correct_choice">
            </p>
            <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>