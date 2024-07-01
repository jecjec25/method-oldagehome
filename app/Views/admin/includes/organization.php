<br>
    <h1 style="text-align: center;color:black;font-weight: bold">ORGANIZATIONAL CHART</h1>
    <br>
    <div style="display:block;margin-left:auto;margin-right:auto;width:30%">
        <?php foreach ($organization as $key => $person): ?>
            <?php if ($key == 0): // Display the first person at the top ?>
                <div class="person" style="text-align: center;">
                    <img src="images/<?= $person['img'] ?>" style="width: 100px;height: auto;">
                    <p style="color:black;font-size:larger;font-weight:bolder"><?= $person['name'] ?></p>
                    <p style="color:black;font-size:large;font-weight:bold"><?= $person['position'] ?></p>
                </div>
                <br>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <div class="row" style="padding-left: 300px">
        <?php foreach ($organization as $key => $person): ?>
            <?php if ($key > 0 && $key <= 2): // Display the next two persons in the second row ?>
                <div class="column" style="float: left;width: 30%; padding:5px; text-align: center;">
                    <img src="images/<?= $person['img'] ?>" style="width: 100px;height: auto;">
                    <p style="color:black;font-size:larger;font-weight:bolder"><?= $person['name'] ?></p>
                    <p style="color:black;font-size:large;font-weight:bold"><?= $person['position'] ?></p>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <div class="row-1" style="padding-left:100px">
        <?php foreach ($organization as $key => $person): ?>
            <?php if ($key > 2 && $key <= 5): // Display the next three persons in the third row ?>
                <div class="column" style="float: left;width: 30%;padding: 5px; text-align: center;">
                    <img src="images/<?= $person['img'] ?>" style="width: 100px;height: auto;">
                    <p style="color:black;font-size:larger;font-weight:bolder"><?= $person['name'] ?></p>
                    <p style="color:black;font-size:large;font-weight:bold"><?= $person['position'] ?></p>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <div class="row-1" style="padding-left:300px">
        <?php foreach ($organization as $key => $person): ?>
            <?php if ($key > 5): // Display the remaining persons in the fourth row ?>
                <div class="column" style="float: left;width: 30%;padding: 5px;text-align: center;">
                    <img src="images/<?= $person['img'] ?>" style="width: 100px;height: auto;">
                    <p style="color:black;font-size:larger;font-weight:bolder"><?= $person['name'] ?></p>
                    <p style="color:black;font-size:large;font-weight:bold"><?= $person['position'] ?></p>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
