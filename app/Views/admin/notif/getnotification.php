<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/css/notif.css" rel='stylesheet' type='text/css' />
</head>
<body>
<div class="container"> 
<p><?= $getNotif['lastname']?><?= $getNotif['firstname']?> Your Event has been <?= $getNotif['status']?></p> <br>
<h1><?= $getNotif['comments']?><br> </h1><h2><?= $getNotif['Time']?></h2><br><h3><?= $getNotif['event']?></h3>
<a href="/booking" class="btn btn-secondary">Back</a>
</div>
</body>
</html>