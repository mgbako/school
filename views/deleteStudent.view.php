<div class="row">
	<p>Are You Sure You Want to delete</p>
	<?php foreach($students as $student):?>
		<h5><?php echo $student['firstName']." ".$student['lastName']." with Username of ".$student['username']; ?></h5>
	<?php endforeach ;?>

	<form action="" method="post">
	<div class="large-12 columns">
		<label><input type="radio" name="sure" value="Yes">Yes</label>
	</div>
	<div class="large-12 columns">
		<label><input type="radio" name="sure" value="No" checked="checked">No</label>
		<input type="hidden" name="id" value="<?php echo $id ;?>">
	</div>
	<div>
		<button type="submit" name="submit" class="button alert radius">Delete</button>
	</div>
	</form>
</div>