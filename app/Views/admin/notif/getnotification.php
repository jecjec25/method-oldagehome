<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
</head>
<body>
    
<p><?= $getNotif['lastname']?><?= $getNotif['firstname']?> Your Event has been <?= $getNotif['status']?></p> <br>
<?= $getNotif['comments']?><br> <?= $getNotif['Time']?><br><?= $getNotif['event']?>

</body>
</html>