<div class="form-top px-4 py-4 row">
	<div class="col-md-9 pl-0">
		<h3 class="mb-0"><i class="fa fa-file-o mr-2" aria-hidden="true"></i>Custom Templates</h3>
	</div>


	<!-- <div class="col-md-3 text-right">
		<a class="btn btn-secondary" href="" class=""><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
	</div> -->
	
</div>

<div class="card bg-dark rounded-0">
	<div class="card-body">
		<form action="<?=base_url()?>sitemanager/templates/save" method="post"class="row mt-3">
			<div class="col-md-10">
				<div class="input-group">
					<input type="text" class="form-control" name="title" placeholder="Template name">
					<div class="input-group-append">
						<div class="input-group-text">.php</div>
					</div>
				</div>
			</div>
		   
			<div class="form-group col-md-2">
				<button type="submit" class="btn btn-info btn-block">Add Template</button>
			</div>
		  
		</form>	
	</div>
</div>

<div class="card-table-list card mb-4 rounded-0">
	
	<div class="card-body">

		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Template Name</th>
						<th>Template File</th>
						<th>Date Created</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Template Name</th>
						<th>Template File</th>
						<th>Date Created</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach($pages as $page):?>

						<tr>
							<td><?=$page['title']?></td>
							<td width="300"><?=$page['slug']?>.php</td>
							<td width="300"><?=$page['created_at']?></td>
							<td width="10"><a class="text-danger" href="<?=base_url()?>sitemanager/templates/delete/<?=$page['id']?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></td>
						</tr>

					<?php endforeach?>
				</tbody>
			</table>
		</div>
	</div>
</div>