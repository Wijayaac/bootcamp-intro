<?php
$scores = [78, 77, 92, 84, 63, 80];
$averageScore = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Exam Scores</title>
</head>

<body>
    <h1>Students exam score</h1>

    <p>List of students score</p>
    <ol>
        <?php for ($index = 1; $index < count($scores); $index++) : ?>
            <li>Student<?= $index ?>'s score is <?= $scores[$index] ?></li>
            <?php $averageScore += $scores[$index] ?>
        <?php endfor ?>
    </ol>
    <p>Average of exam score is <?= number_format($averageScore / (count($scores) - 1), 1)  ?> </p>
</body>

</html>