<?php
$students = [
    [
        "id" => 1220,
        "first_name" => "Lina",
        "last_name" => "Karolina",
        "gender" => "female",
        "exam_score" => 78,
        "quiz_score" => 80,
    ],
    [
        "id" => 1221,
        "first_name" => "Kidi",
        "last_name" => "Alan",
        "gender" => "male",
        "exam_score" => 77,
        "quiz_score" => 79,
    ],
    [
        "id" => 1222,
        "first_name" => "Amar",
        "last_name" => "Tanjung",
        "gender" => "male",
        "exam_score" => 92,
        "quiz_score" => 85,
    ],
    [
        "id" => 1223,
        "first_name" => "Pandu",
        "last_name" => "Ginanjar",
        "gender" => "male",
        "exam_score" => 84,
        "quiz_score" => 84,
    ],
    [
        "id" => 1224,
        "first_name" => "Lili",
        "last_name" => "Pertiwi",
        "gender" => "female",
        "exam_score" => 63,
        "quiz_score" => 81,
    ],
    [
        "id" => 1225,
        "first_name" => "Wirni",
        "last_name" => "Asih",
        "gender" => "female",
        "exam_score" => 80,
        "quiz_score" => 91,
    ],
];
$averageExamScore = 0;
$averageQuizScore = 0;

function concate_full_name(string $firstName, string $lastName): string
{
    return "{$firstName} {$lastName}";
}

function get_final_score(int $examScore, int $quizScore): string
{
    $statusMessage = "Not passed, try next semester!";

    if ($examScore > 80 && $quizScore > 82) {
        $statusMessage = "Passed!";
    } elseif ($examScore > 80) {
        $statusMessage = "Not passed, take a new quiz!";
    } elseif ($quizScore > 82) {
        $statusMessage = "Not passed, take the remedial exam!";
    }

    return $statusMessage;
}
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
            <li><?= concate_full_name($student["first_name"], $student["last_name"]) ?>, Student with id <?= $student["id"] ?>. Your final score status is <?= get_final_score($student["exam_score"], $student["quiz_score"]) ?></li>
            <?php $averageExamScore += $student["exam_score"]
            ?>
            <?php $averageQuizScore += $student["quiz_score"]
            ?>
        <?php endforeach ?>
    </ol>
    <p>Average of exam score is <?= number_format($averageExamScore / count($students), 2) ?> and average of quiz score is <?= number_format($averageQuizScore / count($students), 2) ?> </p>
</body>

</html>