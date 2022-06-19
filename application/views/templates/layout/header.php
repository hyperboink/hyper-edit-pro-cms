<style type="text/css">
	.container{
		width:  979px;
		margin: 0 auto;
	}

	header{
		background: #000;
		width:  100%;
		color:  #fff;
	}

	header .container{
		display:  flex;
		align-items: center;
	}

	.logo{
		flex: 1;
	}

	.logo-text{
		font-size: 20px;
		vertical-align: top;
		padding: 10px 0 0 10px;
		display: inline-block;
	}

	.header-right{
		text-align:  right;
		flex: 1;
	}

	.menu{
		text-align: right;
	}

	.navigation li{
		display: inline-block;
		float: none;
		background: none;
		border: 0;
		margin: 0 4px 10px;
	}

	.navigation li:hover{
		background:  none;
	}

	.navigation li a{
		color:  #fff;
	}

	.navigation li:hover a{
		text-decoration: underline;
	}

	footer{
		background: #000;
		color:  #fff;
		padding:  20px 0;
	}

</style>

<header>
	<div class="container">
		<a class="logo" href="<?=base_url()?>">
			<img src="{image_logo}" width="50" height="50">
			<span class="logo-text">Logo</span>
		</a>
		
		<div class="header-right">
			<p>{contact_phone}</p>
			<div class="menu">
				{menu_1}
			</div>
		</div>
	</div>
	

	
</header>