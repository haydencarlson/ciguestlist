<h2><?= $title ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('index.php/guests/create'); ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="Name">Name</label>
    <input class="form-control" id="yourName" name="name" placeholder="Enter your name">
  </div>
 
 
   <div class="form-group">
    <label for="exampleTextarea">Comment</label>
    <textarea class="form-control" name="comment" id="exampleTextarea" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>