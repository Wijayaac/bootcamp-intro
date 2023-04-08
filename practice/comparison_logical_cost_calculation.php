<?php
$unitLength = isset($_GET['unit']) ? strtolower($_GET['unit']) : "m";
$anggrekStreetLength = $_GET['anggrek_street'] ?? 0;
$kambojaStreetLength = $_GET['kamboja_street'] ?? 0;
$lotusStreetLength = $_GET['lotus_street'] ?? 0;

$isCashReady = isset($_GET['is_cash_available']) ? true : null;
$cashMessage = "Waiting for calculation";
$projectStatus = "Will be postponed, until funds are available";
$cashMessageColor = "normal";


$materialCost = 15000;
$serviceCost = 650000 / 1000; // km to m
$maximumCostAvailable = 20000000;

if ($unitLength === 'km') {
    $anggrekStreetLength *= 1000;
    $kambojaStreetLength *= 1000;
    $lotusStreetLength *= 1000;
} elseif ($unitLength === 'cm') {
    $anggrekStreetLength /= 100;
    $kambojaStreetLength /= 100;
    $lotusStreetLength /= 100;
}

// count the total street
$totalStreetLength = $anggrekStreetLength + $kambojaStreetLength + $lotusStreetLength;
// Total service and material cost
$totalAdditionalCost = $materialCost + $serviceCost;

// Total cost 
$totalCost = $totalStreetLength * $totalAdditionalCost;

// prevent negative value
if ($totalStreetLength < 0) {
    $totalCost = 0;
    $totalStreetLength = 0;
}

if ($anggrekStreetLength && $lotusStreetLength && $kambojaStreetLength) {
    if ($totalCost >= $maximumCostAvailable  && $totalCost >= ($maximumCostAvailable * 2)) {
        $cashMessage = "Lack of funds - apply for financial assistance to the local government.";
        $cashMessageColor = "red";
        $isCashReady = false; // don't know if it's needed
    } elseif ($totalCost >= $maximumCostAvailable) {
        $cashMessage = "Lack of funds - to cover the lack of funds, a fund-raising bazaar was held.";
        $cashMessageColor = "red";
        $isCashReady = false;
    } else {
        $cashMessage = "The budget is sufficient, the source of self-supporting funds from the residents of Perumahan Graha Sentosa only.";
        $projectStatus = "Will be implemented soon!";
        $cashMessageColor = "green";
        $isCashReady = true;
    }
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
                <option value="km" <?= isset($_GET['unit']) ? ($_GET['unit'] === 'km' ? "selected" :  "") : "" ?>>KM</option>
                <option value="m" <?= isset($_GET['unit']) ? ($_GET['unit'] === 'm' ? "selected" :  "") : "" ?>>M</option>
                <option value="cm" <?= isset($_GET['unit']) ? ($_GET['unit'] === 'cm' ? "selected" :  "") : "" ?>>CM</option>
            </select>
        </div>
        <div>
            <label for="anggrek_street">Anggrek Street:</label>
            <input type="number" step="any" name="anggrek_street" id="anggrek_street" value="<?= isset($_GET['anggrek_street']) ? $_GET['anggrek_street'] : '' ?>" required>
        </div>
        <div>
            <label for="kamboja_street">Kamboja Street:</label>
            <input type="number" step="any" name="kamboja_street" id="kamboja_street" value="<?= isset($_GET['kamboja_street']) ? $_GET['kamboja_street'] : '' ?>" required>
        </div>
        <div>
            <label for="lotus_street">Lotus Street:</label>
            <input type="number" step="any" name="lotus_street" id="lotus_street" value="<?= isset($_GET['lotus_street']) ? $_GET['lotus_street'] : '' ?>" required>
        </div>
        <div>
            <label for="is_cash_available">Cash ready?:</label>
            <input type="checkbox" name="is_cash_available" id="is_cash_available" <?= $isCashReady ? "checked" : "" ?>>
        </div>
        <button type="submit">Count</button>
    </form>
    <?php if ($totalStreetLength) : ?>
        <p>Description : To carry out road repairs with a total length of <?= number_format($totalStreetLength, 1) ?> meters, Perumahan Graha Sentosa must prepare a total cost of Rp. <?= number_format($totalCost, 2) ?></p>
    <?php endif ?>

    <?php if (isset($isCashReady)) : ?>
        <p>Budget: Rp. <?= number_format("20000000", 2) ?></p>

        <p>Fund Status : <?= $cashMessage ?></p>
        <p>Project status : <span class="text-<?= $cashMessageColor ?>"><?= $projectStatus ?></span></p>
    <?php endif ?>

</body>

</html>