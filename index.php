<?php
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <header>
            <h1 class="text-center my-4">Hotels</h1>
        </header>
        <main>
            <h2 class="mb-3">I nostri Hotels</h2>
            <ul>
                <?php foreach ($hotels as $hotel): ?>
                    <li>
                        <h3>
                            <?= $hotel['name'] ?>
                        </h3>
                        <ul>
                            <li>
                                <?= $hotel['description'] ?>
                            </li>
                            <li>
                                <?= $hotel['parking'] ?>
                            </li>
                            <li>
                                <?= $hotel['vote'] ?>
                            </li>
                            <li>
                                <?= $hotel['distance_to_center'] ?>
                            </li>
                        </ul>
                    </li>
                <?php endforeach ?>
            </ul>
        </main>
    </div>
</body>

</html>