<h2><?= $title ?></h2>

<?php foreach($guests as $guest) : ?>
	<h3><?php echo $guest['name']; ?></h3>
	<small style="background-color:#f4f4f4; padding:4px; margin:3px;">Posted on : <?php echo $guest['created_at']; ?></small>
	<br><br>
	<?php echo $guest['comment']?>
	<hr>
	<p><a class="btn btn-default" href="<?php echo site_url('/guests/'.$guest['slug']); ?>">Read More</a></p>
<?php endforeach; ?>