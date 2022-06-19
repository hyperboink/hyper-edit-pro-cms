

<style>
	
body{padding:0;margin:0;font-family: 'Exo', sans-serif;}


.errorWrap{
	position: relative;
    background-color:  #23042c;
    background-size: cover;
    background-attachment: fixed;
    height: 100vh;
    color: #fff;
    display:table;
    width:100%;
    text-align:center;
}

.errorst1{
	display:table-cell;
	vertical-align: middle;
}

.errorTitle{    font-size: 70px;}

.errorTxt{font-weight:300; display:block !important;}

a.errorBtn {
    background: #ae175e;
    display: inline-block;
    color: #fff;
    font-size: 20px;
    font-weight: 300;
    padding: 10px 20px;
    margin: 30px 0 0 0;
    text-decoration: none;
}

a.errorBtn:hover{    background: #cf2374;}

</style>

<div class="errorWrap">
	<div class="errorst1 st1Default">
		<div class="errorst2 st2Default">
			<div class="errorTitle">Error 404</div>
			<div class="errorTxt">Wooops! Look like there's no creature in here. <br/> Go back to home and don't get lost again.</div>
			<a href="<?= base_url();?>" class="abtn">Back to Home</a>
		</div>
	</div>

	
</div>


