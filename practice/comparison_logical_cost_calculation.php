<?php
$anggrekStreetLength = isset($_GET['anggrek_street']) ? $_GET['anggrek_street'] * 1000 : 0; //km to m
$kambojaStreetLength = isset($_GET['kamboja_street']) ? $_GET['kamboja_street'] : 0; // m
$lotusStreetLength = isset($_GET['lotus_street']) ? $_GET['lotus_street'] / 100 : 0; // cm to m

$isCashReady = isset($_GET['is_cash_available']) ? true : false;
$cashMessage = "Waiting for calculation";
$cashMessageColor = "normal";

// count the total street
$totalStreetLength = $anggrekStreetLength + $kambojaStreetLength + $lotusStreetLength;

$materialCost = 15000;
$serviceCost = 650000 / 1000; // km to m
$maximumCostAvailable = 20000000;

// Total service and material cost
$totalAdditionalCost = $materialCost + $serviceCost;

// Total cost 
$totalCost = $totalStreetLength * $totalAdditionalCost;

// prevent negative value
if ($totalStreetLength < 0) {
    $totalCost = 0;
    $totalStreetLength = 0;
}

switch ($totalCost) {
    case ($totalCost >= $maximumCostAvailable) && ($totalCost <= $maximumCostAvailable * 2):
        $cashMessage = "Lack of funds - to cover the lack of funds, a fund-raising bazaar was held.";
        $cashMessageColor = "red";
        $isCashReady = false;
        break;
    case $totalCost <= $maximumCostAvailable:
        $cashMessage = "The budget is sufficient, the source of self-supporting funds from the residents of Perumahan Graha Sentosa only.";
        $cashMessageColor = "green";
        $isCashReady = true;
        break;
    case ($totalCost >= $maximumCostAvailable * 2):
        $cashMessage = "Lack of funds - apply for financial assistance to the local government.";
        $cashMessageColor = "red";
        $isCashReady = false; // don't know if it's needed
        break;

    default:
        $cashMessage = "Waiting for calculation";
        $cashMessageColor = "normal";
        break;
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
        <div>
            <label for="is_cash_available">Cash Available:</label>
            <input type="checkbox" name="is_cash_available" id="is_cash_available">
        </div>
        <button type="submit">Submit</button>
    </form>
    <?php if ($totalStreetLength != 0) : ?>
        <p>Description : To carry out road repairs with a total length of <?= number_format($totalStreetLength, 0) ?> meters, Perumahan Graha Sentosa must prepare a total cost of Rp. <?= number_format($totalCost, 2) ?></p>
    <?php endif ?>

    <p class="text-<?= $cashMessageColor ?>"><?= $cashMessage ?></p>
</body>

</html>