
<div class="form-top px-4 py-4 row">
	<div class="col-md-9 pl-4">
		<h3 class="mb-0"><i class="fa fa-cog mr-2" aria-hidden="true"></i> Change Password</h3>
	</div>
	
	<div class="col-md-3 text-right">
		<a class="btn btn-secondary" href="<?=base_url('settings/general')?>" class=""><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
	</div>

</div>

<div class="container-fluid mt-4">

	<?php if(isset($message)):?>
		<div class="mt-4 mx-3 mb-2 alert alert-<?=$message['status']?> fade show" role="alert">
			<?=$message['text']?>
		</div>
	<?php endif?>

	<?php if(validation_errors()):?>
	<div class="alert alert-danger mp-c-0 mt-4 mx-3 mb-2">
		<?=validation_errors()?>
	</div>
	<?php endif?>

	<form action="<?=base_url()?>settings/updatePassword" class="row p-3" method="post">

		<div class="col-md-9 mb-5">

			<div class="card p-4 <?=validation_errors() ? '' : 'pt-5' ?>">

				<div class="card-body">

					<div class="row mb-4">
						<div class="col-md-3">
							<label class="col-form-label" for="">Current password:</label>
						</div>

						<div class="col-md-9">
							<input type="password" name="password" id="password" class="form-control form-control" required/>
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-3">
							<label class="col-form-label" for="">New Password:</label>
						</div>

						<div class="col-md-9">
							<input type="password" name="new_password" id="new-password" class="form-control form-control" required/>
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-3">
							<label class="col-form-label" for="">Confirm Password:</label>
						</div>

						<div class="col-md-9">
							<input type="password" name="confirm_password" id="confirm-password" class="form-control form-control" required/>
						</div>
					</div>

					

				</div>

			</div>

		</div>

		<div class="col-md-3">
			<div class="sticky-top save-page-wrap">
				<div class="card">
					<div class="card-body">

						<h4 class="text-center mb-3">Update?</h4>

						<button type="submit" name="submit" class="btn btn-info btn-block"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update Password</button>
					</div>
				</div>
			</div>
		</div>

	</form>
</div>


