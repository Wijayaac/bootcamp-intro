<?php
$students = [
    [
        "id" => 1220,
        "name" => "Lina",
        "exam_score" => 78,
        "quiz_score" => 80,
    ],
    [
        "id" => 1221,
        "name" => "Kidi",
        "exam_score" => 77,
        "quiz_score" => 79,
    ],
    [
        "id" => 1222,
        "name" => "Amar",
        "exam_score" => 92,
        "quiz_score" => 85,
    ],
    [
        "id" => 1223,
        "name" => "Pandu",
        "exam_score" => 84,
        "quiz_score" => 84,
    ],
    [
        "id" => 1224,
        "name" => "Lili",
        "exam_score" => 63,
        "quiz_score" => 81,
    ],
    [
        "id" => 1225,
        "name" => "Wirni",
        "exam_score" => 80,
        "quiz_score" => 91,
    ],
];
$averageExamScore = 0;
$averageQuizScore = 0;
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
        <?php foreach ($students as $key => $student) : ?>
            <li>Student with id <?= $student["id"] ?> named <?= $student["name"] ?>, got exam score <?= $student["exam_score"] ?> and quiz score <?= $student["quiz_score"] ?></li>
            <?php $averageExamScore += $student["exam_score"]
            ?>
            <?php $averageQuizScore += $student["quiz_score"]
            ?>
        <?php endforeach ?>
    </ol>
    <p>Average of exam score is <?= number_format($averageExamScore / count($students), 2) ?> and average of quiz score is <?= number_format($averageQuizScore / count($students), 2) ?> </p>
</body>

</html>