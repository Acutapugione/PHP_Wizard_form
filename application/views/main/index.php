<h2>
    Главная страница 
</h2>
<?php foreach ($members as $member): ?>
    <p><?php echo $member['first_name'].' '.$member['last_name']; ?></p> 
<?php endforeach; ?>