<?php
$quotes = [
    [
        "author" => "Ludwig van Beethoven",
        "quote" => "Art! Who comprehends her? With whom can one consult concerning this great goddess?"
    ],
    [
        "author" => "Nelson Mandela",
        "quote" => "The greatest glory in living lies not in never falling, but in rising every time we fall."
    ],
    [
        "author" => "Steve Jobs",
        "quote" => "Your time is limited, so don't waste it living someone else's life. Don't be trapped by dogma – which is living with the results of other people's thinking."
    ],
    [
        "author" => "Walt Disney",
        "quote" => "The way to get started is to quit talking and begin doing."
    ],
    [
        "author" => "Eleanor Roosevelt",
        "quote" => "If life were predictable it would cease to be life, and be without flavor."
    ],
];

$randomAuthor = rand(0, 4);
$selectedAuthor = $quotes[$randomAuthor];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotes Generator</title>
</head>

<body>
    <h1>Quote of the day</h1>
    <pre>Press F5 to randomize the author</pre>

    <h2 style="max-width: 450px;">"<?= $selectedAuthor["quote"] ?>" - <?= $selectedAuthor['author'] ?></h2>
</body>

</html>