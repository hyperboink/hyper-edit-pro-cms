<!DOCTYPE html>
<html>
<head>
<?=$headtags ?? ''?>
</head>

<body class="sb-nav-fixed">

	<?=$header ?? ''?>

	<div class="content-con clear">
		<div id="layoutSidenav" class="content-con-in">

			<?=$sidebar ?? ''?>

			<div id="layoutSidenav_content">
    			<main>
					<?=$content ?? ''?>
				</main>
			</div>
		</div>
	</div>

	<?=$footer ?? ''?>

</body>
</html>