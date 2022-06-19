<!--v2-->

<style>
	.card{
		width: 767px;
		margin: 20px auto;
		background: #fff;
		padding: 20px;
	}

	.card h3{
		//text-align: center;
	}

	.custom-template-form{
		margin: 8px 0 13px;
	}

	.title-con{
		position: relative;
	}

	.title-con span{
		position: absolute;
	    top: 8px;
	    right: 10px;
	}

	#title{
		padding-right: 41px;
	}

	.submi-con{
		text-align: right;
	}

	.custom-template-form input[type="submit"]{
		//width: auto;
	}

	
	.page-listing{
		margin: 7px 0 0;
	}

	a.template-delete-btn{
		color: red;
	}

	table{
		width: 100%;
		border: 0;
		word-break: break-word;
	}

	td{
		padding: 5px;
		border: solid #ddd 1px;
		width: 30%;
	}
</style>

<div class="card">

	<h3>Create Custom Template</h3>

	{file_message}

	<form action="<?=base_url()?>pagesv2/save" method="POST" class="custom-template-form">
	
		<div class="input-con">
			<div class="title-con">
				<input type="text" name="title" id="title" placeholder="Input title here">
				<span>.php</span>
			</div>
		</div>

		<div class="input-con submi-con">
			<input type="submit" value="Add Template">
		</div>



	</form>

	<h3>Templates</h3>

	<table class="page-listing">
		<tbody>
			<tr>
				<td>Original Name</td>
				<td>File Name</td>
				<td>Date Created</td>
				<td>Action</td>
			</tr>
			{pages}
				<tr>
					<td>{title}</td>
					<td>{slug}.php</td>
					<td>{created_at}</td>
					<td>
						<a href="<?=base_url()?>pagesv2/delete/{id}" class="template-delete-btn">delete</a>
					</td>
				</tr>
			{/pages}
			
		</tbody>
	</table>
</div>
