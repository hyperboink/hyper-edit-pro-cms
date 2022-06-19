
<div class="container-fluid">

	<h3 class=" font-weight-light my-4 text-capitalize"><?=$title?></h3>
		
	<form action="<?=base_url()?>admin/pages/update/<?=$id?>" class="row" method="POST">

		<div class="col-md-9">

			<?php if(isset($content) && count($content)):?>

				<div class="card">

					<div class="card-body">
						<?php if(isset($message)):?>
						<div class="alert alert-success" role="alert">
							<?=$message?>
						</div>
						<?php endif?>

						<?php foreach($content as $key => $data):?>

							<?php if($data['type'] == 'title'):?>
								<div class="form-group">
									<label class="mb-1 font-weight-bold" for="<?=$key?>"><?=$data['title']?> Title:</label>
									<input type="text" name="<?=$key?>" id="<?=$key?>" class="form-control form-control-sm" value="<?=$data['value']?>"/>
								</div>
							<?php endif?>

							<?php if($data['type'] == 'content'):?>
								<div class="form-group">
									<label class="mb-1 font-weight-bold" for="<?=$key?>"><?=$data['title']?> Content:</label>
									<textarea name="<?=$key?>" id="<?=$key?>" class="form-control form-control-sm"  rows="5"><?=$data['value']?></textarea>
								</div>
							<?php endif?>

						<?php endforeach?>

					</div>
				</div>

			<?php else:?>

				<div class="card border-info text-info">
					<div class="card-body">
						<p class="mb-0">No fields here. :(</p>
					</div>
				</div>
						
			<?php endif?>

			

		</div>

		<div class="col-md-3">
			<div class="sticky-top save-page-wrap">
				<div class="card">
					<div class="card-body">

						<h4 class="text-center">Page Settings</h4>

						<div class="form-group mt-4 mb-4">

							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck" name="example1" <?=$status == '1' ? 'checked' : 'rawr' ?>>
								<label class="custom-control-label" for="customCheck">Disable/enable page</label>
							</div>
							
						</div>

						<button type="submit" class="btn btn-info btn-block">Save</button>
					</div>
				</div>
			</div>
		</div>


		<!-- <?php foreach($content as $key => $data):?>

			<?php if($data['type'] == 'title'):?>
				<div class="input-con">
					<label for=""><?=$data['title']?> Title:</label>
					<input type="text" value="<?=$data['value']?>">
				</div>
			<?php endif?>

			<?php if($data['type'] == 'content'):?>
				<div class="input-con">
					<label for=""><?=$data['title']?> Title:</label>
					<textarea name="" id="" cols="30" rows="10"><?=$data['value']?></textarea>
				</div>
			<?php endif?>

		<?php endforeach?> -->

	</form>
</div>

