<?php
$angrekStreetLength = 0.8 * 1000; //km to m
$kambojaStreetLength = 500; // m
$lotusStreetLength = 2500 / 100; // cm to m
// count the total street
$totalStreetLength = $angrekStreetLength + $kambojaStreetLength + $lotusStreetLength;

$materialCost = 15000;
$serviceCost = 650000 / 1000; // km to m

// Total service and material cost
$totalAdditionalCost = $materialCost + $serviceCost;

// Total cost 
$totalCost = $totalStreetLength * $totalAdditionalCost;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cost Calculation</title>
</head>

<body>
    <p>Description : To carry out road repairs with a total length of <?= number_format($totalStreetLength, 0) ?> meters, Perumahan Graha Sentosa must prepare a total cost of Rp. <?= number_format($totalCost, 2) ?></p>
</body>

</html>