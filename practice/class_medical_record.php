<?php

require_once "./class/Person.php";
require_once "./class/MassIndex.php";
require_once "./class/BodyMassIndex.php";
require_once "./class/RelativeMassIndex.php";
require_once "./helper/get_input.php";


// GET form value
$namePerson = get_input("name", "");
$agePerson = get_input("age", 0);
$genderPerson = get_input("gender", "m");
$heightPerson = get_input("height", 0);
$weightPerson = get_input("weight", 0);
$waistPerson = get_input("waist_size", 0);

// person assigment propertie through methods
$objPerson = new Person($namePerson, $agePerson, $genderPerson);
$objPerson->bodyFact($heightPerson, $weightPerson, $waistPerson);

// calculation
// BMI
$bmiPerson = new BodyMassIndex();
$bmiPerson->calculate($objPerson->height, $objPerson->weight);
$scoreBMI = $bmiPerson->getScore();
$categoryBMI = $bmiPerson->getCategory();

// RFM
$rfmPerson = new RelativeMass();
$rfmPerson->calculate($objPerson->height, $objPerson->waistSize, $objPerson->gender);
$scoreRFM = $rfmPerson->getScore();
$categoryRFM = $rfmPerson->getCategory();

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
                    <input type="radio" name="gender" value="m" id="male">
                    <label for="male">Male</label>
                </div>
                <div class="radio">
                    <input type="radio" name="gender" value="f" id="female">
                    <label for="female">Female</label>
                </div>
            </div>
            <div class="field">
                <label for="height">Height(CM)</label>
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
            <?php foreach ($objPerson as $key => $value) : ?>
                <li><?= $key ?> : <?= $value ?></li>
            <?php endforeach ?>
            <li>BMI Score : <?= number_format($scoreBMI, 2) ?>, belongs to the category <?= $categoryBMI ?></li>
            <li>RFM Score : <?= number_format($scoreRFM, 2) ?>%, belongs to the category <?= $categoryRFM ?></li>
        </ul>
    </div>
</body>

</html>