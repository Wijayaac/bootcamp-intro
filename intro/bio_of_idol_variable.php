<?php
$name = "Elon Musk";
$address = "Mexico";
$bornDate = "22 December 1998";
$job = "CEO";

$bioTitle = "Biodata {$name}";
$bioDescription = "A {$job} of Manchester United Football Club. He was born on {$bornDate} and live at {$address}";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $name; ?></title>
</head>

<body>
    <h1>
        <?= $bioTitle; ?>
    </h1>
    <p>
        <?= $bioDescription; ?>
    </p>
</body>

</html>