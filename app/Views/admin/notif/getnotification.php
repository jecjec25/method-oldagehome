<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Notification</title>
    <link rel="icon" type="image/png" href="/picture.png">
   <link href="/css/notif.css" rel='stylesheet' type='text/css' />

</head>
<body>
<div class="container"> 
<p> <?= $getNotif['establishment']?> <?= $getNotif['lastname']?> <?= $getNotif['firstname']?> Your Event has been <?= $getNotif['status']?></p>
<h1>Event: <?= $getNotif['event']?><br> </h1><h2>Time: <?= $getNotif['Time']?></h2><br><h2>Date: <?= $getNotif['prefferdate']?></h2>
<h2>Equipment: <?= $getNotif['equipment']?><br> </h2><h2>Comment: <?= $getNotif['comments']?></h2>
<br>
<a href="/booking" class="btn btn-secondary">Back</a>
<br>
<br>
</div>
</body>
</html>