<?php
$anggrekStreetLength = isset($_GET['anggrek_street']) ? $_GET['anggrek_street'] * 1000 : 0; //km to m
$kambojaStreetLength = isset($_GET['kamboja_street']) ? $_GET['kamboja_street'] : 0; // m
$lotusStreetLength = isset($_GET['lotus_street']) ? $_GET['lotus_street'] / 100 : 0; // cm to m

$isCashReady = false;

// count the total street
$totalStreetLength = $anggrekStreetLength + $kambojaStreetLength + $lotusStreetLength;

$materialCost = 15000;
$serviceCost = 650000 / 1000; // km to m

// Total service and material cost
$totalAdditionalCost = $materialCost + $serviceCost;

// Total cost 
$totalCost = $totalStreetLength * $totalAdditionalCost;

if ($totalStreetLength < 0) {
    $totalCost = 0;
    $totalStreetLength = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cost Calculation</title>
    <style>
        .text-red {
            color: red;
        }

        .text-green {
            color: green;
        }
    </style>
</head>

<body>
    <form action="" method="GET">
        <div>
            <label for="anggrek_street">Anggrek Street (KM):</label>
            <input type="number" step="any" name="anggrek_street" id="anggrek_street" required>
        </div>
        <div>
            <label for="kamboja_street">Kamboja Street (M):</label>
            <input type="number" step="any" name="kamboja_street" id="kamboja_street" required>
        </div>
        <div>
            <label for="lotus_street">Lotus Street (CM):</label>
            <input type="number" step="any" name="lotus_street" id="lotus_street" required>
        </div>
        <button type="submit">Submit</button>
    </form>

    <?php if ($totalStreetLength != 0) : ?>
        <p>Description : To carry out road repairs with a total length of <?= number_format($totalStreetLength, 0) ?> meters, Perumahan Graha Sentosa must prepare a total cost of Rp. <?= number_format($totalCost, 2) ?></p>
    <?php endif ?>

    <?php if ($isCashReady) : ?>
        <p class="text-green">The project will be implemented soon!</p>
    <?php else : ?>
        <p class="text-red">The project implementation will be postponed until funds are available</p>
    <?php endif ?>
</body>

</html>