<?php
$unitLength = isset($_GET['unit']) ? strtolower($_GET['unit']) : "m";
$anggrekStreetLength = isset($_GET['anggrek_street']) ? $_GET['anggrek_street'] : 0;
$kambojaStreetLength = isset($_GET['kamboja_street']) ? $_GET['kamboja_street'] : 0;
$lotusStreetLength = isset($_GET['lotus_street']) ? $_GET['lotus_street'] : 0;

$isCashReady = isset($_GET['is_cash_available']) ? true : false;
$dividerValue = 1;

switch ($unitLength) {
    case 'km':
        $anggrekStreetLength *= 1000;
        $kambojaStreetLength *= 1000;
        $lotusStreetLength *= 1000;
        $serviceCost = 650000 / 1;
        break;
    case 'cm':
        $anggrekStreetLength /= 1000;
        $kambojaStreetLength /= 1000;
        $lotusStreetLength /= 1000;
        $serviceCost = 650000 / 1000000;
        break;

    default:
        $anggrekStreetLength = $anggrekStreetLength * 1;
        $kambojaStreetLength = $kambojaStreetLength * 1;
        $lotusStreetLength = $lotusStreetLength * 1;
        $serviceCost = 650000 / 1000;
        break;
}

// count the total street
$totalStreetLength = $anggrekStreetLength + $kambojaStreetLength + $lotusStreetLength;

$materialCost = 15000;

// $serviceCost = 650000 / 1000; // km to m

// Total service and material cost
$totalAdditionalCost = $materialCost + $serviceCost;

// Total cost 
$totalCost = $totalStreetLength * $totalAdditionalCost;

if ($totalStreetLength < 0) {
    $totalCost = 0;
    $totalStreetLength = 0;
}

switch ($isCashReady) {
    case true:
        $cashMessage = "The project will be implemented soon!";
        $cashMessageColor = "green";
        break;

    default:
        $cashMessage = "The project implementation will be postponed until funds are available";
        $cashMessageColor = "red";
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
            <label for="unit">Unit Length:</label>
            <select name="unit" id="unit">
                <option value="km">KM</option>
                <option value="km">M</option>
                <option value="km">CM</option>
            </select>
        </div>
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

    <?php if ($totalStreetLength > 0) : ?>
        <p>Description : To carry out road repairs with a total length of <?= number_format($totalStreetLength, 0) ?> meters, Perumahan Graha Sentosa must prepare a total cost of Rp. <?= number_format($totalCost, 2) ?></p>
    <?php endif ?>

    <p class="text-<?= $cashMessageColor ?>"><?= $cashMessage ?></p>
</body>

</html>