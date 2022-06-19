<!--v1-->

<form action="<?=base_url()?>pagesv1/save" method="POST">
	
	<div>
		<label for="">Title</label><br>
		<input type="text" name="title">
	</div>

	<div>
		<label for="">Content</label><br>
		<textarea name="content" id="" cols="30" rows="10"></textarea>
	</div>
	<input type="submit" value="Add">
</form>