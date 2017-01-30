<h2><?php echo $guest['name']; ?></h2>
<small class="post-date">Posted on: <?php echo $guest['created_at']; ?></small><br>
<div class="post-body">
	<?php echo $guest['comment']; ?>
</div>
<hr>
<?php echo form_open('index.php/guests/delete/'.$guest['id']); ?>
	<input type="submit" value="Delete" class="btn btn-danger">
</form>