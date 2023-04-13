<?php

require "./class/Person.php";

$objPerson = new Person();

// GET form value
$namePerson = get_input("name", "");
$agePerson = get_input("age", 0);
$genderPerson = get_input("gender", "m");
$heightPerson = get_input("height", 0);
$weightPerson = get_input("weight", 0);
$waistPerson = get_input("waist_size", 0);

// helper function
function get_input(string $inputName, $defaultValue)
{
    $result = $defaultValue;

    if (isset($_GET[$inputName]) && $_GET[$inputName] !== "") {
        $result = $_GET[$inputName];
    }

    return $result;
}

// calculation
// BMI
$scoreBMI = 0;
$categoryBMI = "";

// RFM
$scoreRFM = 0;
$categoryRFM = "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP Practice</title>
</head>

<body>
    <div class="container">
        <h1>Body Mass Index (BMI) and Relative Fat Mass (RFM) Category Calculator </h1>

        <p>Form Input</p>
        <form action="" class="form" method="GET">
            <div class="field">
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="field">
                <label for="age">Age</label>
                <input type="number" name="age" id="age">
            </div>
            <div class="field">
                <div class="radio">
                    <input type="radio" name="gender" id="male">
                    <label for="male">Male</label>
                </div>
                <div class="radio">
                    <input type="radio" name="gender" id="female">
                    <label for="female">Female</label>
                </div>
            </div>
            <div class="field">
                <label for="height">Height</label>
                <input type="number" name="height" id="height">
            </div>
            <div class="field">
                <label for="weight">Weight</label>
                <input type="number" name="weight" id="weight">
            </div>
            <div class="field">
                <label for="waist_size">Waist Size</label>
                <input type="number" name="waist_size" id="waist_size">
            </div>
            <button type="submit">Count</button>
        </form>

        <p>User details</p>
        <ul class="detail">
            <li>Name : <?= $namePerson ?></li>
            <li>Age : <?= $agePerson ?></li>
            <li>Gender : <?= $genderPerson ?></li>
            <li>Height : <?= $heightPerson ?></li>
            <li>Weight : <?= $weightPerson ?></li>
            <li>Waist Size : <?= $waistPerson ?></li>
            <li>BMI Score : <?= $scoreBMI ?>, belongs to the category <?= $categoryBMI ?></li>
            <li>RFM Score : <?= $scoreRFM ?>, belongs to the category <?= $categoryRFM ?></li>
        </ul>
    </div>
</body>

</html>