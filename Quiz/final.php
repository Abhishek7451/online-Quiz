<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Result</title>
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
        <h2>Your Result</h2>
        <p>Congratulations! You have completed this test successfully.</p>
        <p>Your <strong>Score</strong> is <?php echo $_SESSION['score']; ?></p>
        <?php unset($_SESSION['score']); ?>
    </div>
</main>
<footer>
    <div class="container">
        Copyright &copy; IT ABHISHEK SAINI
    </div>
</footer>
</body>
</html>
