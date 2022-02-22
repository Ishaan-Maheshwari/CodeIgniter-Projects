<?php foreach ($users as $user): ?>

<h3><?php echo $user['username']; ?></h3>
<div class="main">
        <?php echo $user['email']; ?>
</div>

<?php endforeach; ?>