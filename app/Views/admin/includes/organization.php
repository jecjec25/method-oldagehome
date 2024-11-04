<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            color: black;
            font-weight: bold;
        }
        .person {
            text-align: center;
        }
        .column {
            float: left;
            width: 30%;
            padding: 5px;
            text-align: center;
        }
        .row {
            overflow: hidden; /* Clear floats */
            padding-left: 300px; /* For larger screens */
        }
        .row-1 {
            overflow: hidden; /* Clear floats */
            padding-left: 100px; /* For smaller third row */
        }
        /* Media queries for mobile responsiveness */
        @media (max-width: 768px) {
            .row, .row-1 {
                padding-left: 0; /* Reset padding for mobile */
                width: 100%; /* Make full width */
            }
            .column {
                float: none; /* Stack vertically */
                width: 100%; /* Full width for each column */
                margin: 0 auto; /* Center the column */
            }
            /* Pyramid structure */
            .pyramid {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <h1>ORGANIZATIONAL CHART</h1>
    <br>
    <div class="pyramid" style="width: 100%;">
        <?php foreach ($organization as $key => $person): ?>
            <?php if ($key == 0): // Display the first person at the top ?>
                <div class="person">
                    <img src="images/<?= $person['img'] ?>" style="width: 100px;height: auto;">
                    <p style="color:black;font-size:larger;font-weight:bolder"><?= $person['name'] ?></p>
                    <p style="color:black;font-size:large;font-weight:bold"><?= $person['position'] ?></p>
                </div>
                <br>
            <?php endif; ?>
        <?php endforeach; ?>

        <div class="row">
            <?php foreach ($organization as $key => $person): ?>
                <?php if ($key > 0 && $key <= 2): // Display the next two persons in the second row ?>
                    <div class="column">
                        <img src="images/<?= $person['img'] ?>" style="width: 100px;height: auto;">
                        <p style="color:black;font-size:larger;font-weight:bolder"><?= $person['name'] ?></p>
                        <p style="color:black;font-size:large;font-weight:bold"><?= $person['position'] ?></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="row-1">
            <?php foreach ($organization as $key => $person): ?>
                <?php if ($key > 2 && $key <= 5): // Display the next three persons in the third row ?>
                    <div class="column">
                        <img src="images/<?= $person['img'] ?>" style="width: 100px;height: auto;">
                        <p style="color:black;font-size:larger;font-weight:bolder"><?= $person['name'] ?></p>
                        <p style="color:black;font-size:large;font-weight:bold"><?= $person['position'] ?></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="row-1">
            <?php foreach ($organization as $key => $person): ?>
                <?php if ($key > 5): // Display the remaining persons in the fourth row ?>
                    <div class="column">
                        <img src="images/<?= $person['img'] ?>" style="width: 100px;height: auto;">
                        <p style="color:black;font-size:larger;font-weight:bolder"><?= $person['name'] ?></p>
                        <p style="color:black;font-size:large;font-weight:bold"><?= $person['position'] ?></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
