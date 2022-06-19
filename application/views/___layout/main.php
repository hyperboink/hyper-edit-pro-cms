<!DOCTYPE html>
<html>
<head>
<?= $head_tags ?? ''?>
</head>

<body id="<?=isset($id) ? 'body-'.$id : ''?>" class="<?=isset($body_class) ? ''.$body_class : ''?>">

	<?=$header ?? ''?>

	<?=$content ?? ''?>

	<?=$sidebar ?? ''?>

	<?=$footer ?? ''?>

	<script>
		<?=$additional_script ?? ''?>
	</script>

</body>

</html>