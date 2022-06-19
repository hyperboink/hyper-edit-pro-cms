<!DOCTYPE html>
<html>
<head>
	<title>{site_page_title}</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?=base_url('assets/css/prettyPhoto.css')?>"/>
	<link rel="stylesheet" href="<?=base_url('assets/admin/css/jquery.datetimepicker.css')?>">
	<?= $head_tags ?? ''?>
</head>

<body id="<?=isset($id) ? 'body-'.$id : ''?>" class="<?=isset($body_class) ? ''.$body_class : ''?>">

<?=$header ?? ''?>

<?=$content ?? ''?>

<?=$slug != 'home' ? $sidebar : ''?>

<?=$footer ?? ''?>

<script src="<?=base_url('assets/js/jquery.prettyPhoto.js')?>"></script>
<script src="<?=base_url('assets/admin/js/jquery.datetimepicker.js')?>"></script>
<script src="<?=base_url('assets/admin/js/form.js')?>"></script>
<script><?=$additional_script ?? ''?></script>

</body>

</html>