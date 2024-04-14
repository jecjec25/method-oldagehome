
<?php foreach($news as $single_news):?>
        <ul>
            <li>
                <?= $single_news['title'];?> <br>
                <?= $single_news['Content']?> <br>
                <?= $single_news['author']?> <br>
                <?= $single_news['Category']?> <br>
                <?= $single_news['picture']?> <br>
                <?= $single_news['Feedback']?>
            </li>
        </ul>
   <?php endforeach; ?>
    </div>
    <div>
	<?php foreach($events as $mevents): ?>
                <tr>
					<ul>
                    <li><?=$mevents['Title'] ?><br>
                    <?=$mevents['Description'] ?><br>
                    <?=$mevents['Organizer'] ?><br>
                    <?=$mevents['Start_date'] ?><br>
                    <?=$mevents['End_date'] ?><br>
                    <?=$mevents['Category']?><br>
                    <?=$mevents['Status'] ?><br>
                    <?=$mevents['Atendees'] ?><br>
                    <?=$mevents['Attachments'] ?><br>
                    <?=$mevents['Feedback'] ?></li>
				         </ul>
                  <?php endforeach; ?>
                  </div>                 
