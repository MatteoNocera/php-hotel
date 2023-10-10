<?php

/* 
Descrizione
Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G
Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate in modo graduale. Prima stampate in pagina i dati, senza preoccuparvi dello stile. Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
Bonus:
 Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore) Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel
*/

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

//var_dump($hotels);

$vote = $_GET['vote_ranking'];
$parking = $_GET['parking_chose'];


if ($parking === 'yes') {
    var_dump('yes P');
} elseif ($parking === 'no') {
    var_dump('no P');
} else {
    var_dump('all');
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <form action="" method="GET">



            <div class="col-md-4">


                <label for="parking_chose">Do you want hotel with parking?</label>
                <select id="parking_chose" name="parking_chose" class="form-select mb-3" aria-label="Default select example">
                    <option value="" selected></option>
                    <option value="yes">yes</option>
                    <option value="no">no</option>
                </select>

                <label for="vote_rating">Select vote ranking</label>
                <select id="vote_rating" name="vote_rating" class="form-select mb-3" aria-label="Default select example">
                    <option value="" selected></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <button type="submit" class="btn btn-primary">Filter</button>
            </div>


        </form>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"> Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to Center</th>
                </tr>
            </thead>

            <?php foreach ($hotels as $key => $hotel) : ?>


                <tbody>
                    <tr>


                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $hotel['name'] ?></td>
                        <td><?= $hotel['description'] ?></td>

                        <td>
                            <?php
                            if ($hotel['parking'] === true) :
                                echo 'Yes';
                            else :
                                echo 'No';

                            endif;
                            ?>
                        </td>

                        <td><?= $hotel['vote'] ?></td>
                        <td><?= $hotel['distance_to_center'] . ' km' ?></td>









                    </tr>

                </tbody>
            <?php endforeach; ?>
        </table>

    </div>

</body>

</html>