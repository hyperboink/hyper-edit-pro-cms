<?php echo form_open('index.php/auth/login/encrypt');?>

	<input type="text" name="encrypt_n" placeholder="Input string here...">

	<input type="submit" name="convertBtn" value="Convert">	

<?=form_close(); ?>