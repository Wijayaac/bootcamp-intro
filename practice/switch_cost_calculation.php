<?php
$unitLength = isset($_GET['unit']) ? strtolower($_GET['unit']) : "m";
$anggrekStreetLength = $_GET['anggrek_street'] ?? 0;
$kambojaStreetLength = $_GET['kamboja_street'] ?? 0;
$lotusStreetLength = $_GET['lotus_street'] ?? 0;

$isCashReady = isset($_GET['is_cash_available']) ? true : false;

$materialCost = 15000;
$serviceCost = 650000 / 1000;

switch ($unitLength) {
    case 'km':
        $anggrekStreetLength *= 1000;
        $kambojaStreetLength *= 1000;
        $lotusStreetLength *= 1000;
        break;
    case 'cm':
        $anggrekStreetLength /= 100;
        $kambojaStreetLength /= 100;
        $lotusStreetLength /= 100;
        break;

    default:
        break;
}

// count the total street
$totalStreetLength = $anggrekStreetLength + $kambojaStreetLength + $lotusStreetLength;

// Total service and material cost
$totalAdditionalCost = $materialCost + $serviceCost;
var_dump([$anggrekStreetLength, $kambojaStreetLength, $lotusStreetLength]);

// Total cost 
$totalCost = $totalStreetLength * $totalAdditionalCost;

// Prevent negative total in cost calculation
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
                <option value="m">M</option>
                <option value="cm">CM</option>
            </select>
        </div>
        <div>
            <label for="anggrek_street">Anggrek Street:</label>
            <input type="number" step="any" name="anggrek_street" id="anggrek_street" required>
        </div>
        <div>
            <label for="kamboja_street">Kamboja Street:</label>
            <input type="number" step="any" name="kamboja_street" id="kamboja_street" required>
        </div>
        <div>
            <label for="lotus_street">Lotus Street:</label>
            <input type="number" step="any" name="lotus_street" id="lotus_street" required>
        </div>
        <div>
            <label for="is_cash_available">Cash Available:</label>
            <input type="checkbox" name="is_cash_available" id="is_cash_available">
        </div>
        <button type="submit">Submit</button>
    </form>

    <?php if ($totalStreetLength) : ?>
        <p>Description : To carry out road repairs with a total length of <?= number_format($totalStreetLength, 0) ?> meters, Perumahan Graha Sentosa must prepare a total cost of Rp. <?= number_format($totalCost, 2) ?></p>
    <?php endif ?>

    <p class="text-<?= $cashMessageColor ?>"><?= $cashMessage ?></p>
</body>

</html>