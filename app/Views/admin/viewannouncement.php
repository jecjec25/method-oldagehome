<div>
<?php foreach($announce as $pannounce):?>
<ul>
    <li>
        <?= $pannounce['Title']?> <br>
        <?= $pannounce['Content']?> <br>
        <?= $pannounce['Author']?> <br>
        <?= $pannounce['Category']?> <br>
        <?= $pannounce['Priority']?> <br>
        <?= $pannounce['Attachments']?> <br>
       <br>
    </li>
</ul>
<?php endforeach; ?>
</div>