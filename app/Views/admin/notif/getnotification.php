<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Notification</title>
   <link href="/css/notif.css" rel='stylesheet' type='text/css' />

</head>
<body>
<div class="container"> 
<p><?= $getNotif['lastname']?> <?= $getNotif['firstname']?> Your Event has been <?= $getNotif['status']?></p> <br>
<h1>Event: <?= $getNotif['event']?><br> </h1><h2>Time: <?= $getNotif['Time']?></h2><br><h3>Date: <?= $getNotif['prefferdate']?></h3>
<h1>Equipment: <?= $getNotif['equipment']?><br> </h1><h2>Comment: <?= $getNotif['comments']?></h2>
<a href="/booking" class="btn btn-secondary">Back</a>
</div>
</body>
</html>