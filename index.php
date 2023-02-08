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
//Creo array delle chiavi di un elemento di $hotels
$hotel_keys = str_replace('_', ' ', array_keys(array_change_key_case($hotels[0], CASE_UPPER)));

//Array per generare le options
$parcking_options = [
    [
        'value' => 'all',
        'text' => 'All'
    ],
    [
        'value' => 'true',
        'text' => 'Con parcheggio'
    ],
    [
        'value' => 'false',
        'text' => 'Senza parcheggio'
    ],
];
$hotels_vote = [1, 2, 3, 4, 5];


$parking = $_GET['parking'] ?? 'all';
$vote = $_GET['vote'] ?? 1;


function vote_filter($array)
{
    $vote = $_GET['vote'] ?? 1;
    return $array['vote'] >= $vote;
}

$vote_filtered_hotels = array_filter($hotels, "vote_filter");

function parking_filter($array)
{
    $parking = $_GET['parking'] ?? 'all';

    if ($parking === 'all') {
        return true;
    } else if ($parking === 'true') {
        return $array['parking'];
    } else {
        return !$array['parking'];
    }
}

$filtered_parking = array_filter($vote_filtered_hotels, "parking_filter");

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <header>
            <h1 class="text-center my-4">Hotels</h1>
        </header>
        <main>
            <h2 class="mb-4">I nostri Hotels</h2>
            <form action="" class="d-flex align-items-center">
                <div class="mb-4">
                    <label for="parking" class="mb-2">Filtra gli hotels per parcheggio:</label>
                    <select class="form-select" id="parking" name='parking'>
                        <?php foreach ($parcking_options as $option): ?>
                            <option value="<?= $option['value'] ?>" <?php if ($parking === $option['value'])
                                  echo ('selected') ?>><?= $option['text'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-4 ms-5">
                    <label for="vote" class="mb-2">Filtra gli hotels per voto:</label>
                    <select class="form-select" id="vote" name='vote'>
                        <?php foreach ($hotels_vote as $hotel_vote): ?>
                            <option <?php if ($hotel_vote === intval($vote))
                                echo ('selected') ?>><?= $hotel_vote ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <button class="btn btn-primary ms-5">Filtra</button>
            </form>
            <table class="table table-dark table-striped text-center">
                <thead>
                    <tr>
                        <?php foreach ($hotel_keys as $value): ?>
                            <th scope="col">
                                <?= $value ?>
                            </th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($filtered_parking as $hotel): ?>
                        <tr>
                            <th scope="row">
                                <?= $hotel['name'] ?>
                            </th>
                            <td>
                                <?= $hotel['description'] ?>
                            </td>
                            <td>
                                <i
                                    class="bi <?= $hotel['parking'] ? 'bi-check-circle text-success' : 'bi-x-circle text-danger' ?>"></i>
                            </td>
                            <td>
                                <?= $hotel['vote'] ?>
                            </td>
                            <td>
                                <?= $hotel['distance_to_center'] ?> km
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>