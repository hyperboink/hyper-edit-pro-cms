
<div class="form-top px-4 py-4 row">
	<div class="col-md-9 pl-4">
		<h3 class="mb-0"><i class="fa fa-envelope-o mr-2" aria-hidden="true"></i> Form Settings</h3>
	</div>

	<!-- <div class="col-md-3 pr-4 text-right">
		<a class="btn btn-secondary" href="<?=$prev_url?>" class=""><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
	</div> -->

	<div class="col-md-3 text-right">
		<a class="btn btn-secondary" href="<?=base_url('form/edit/' . $form->form_id)?>" class=""><i class="fa fa-angle-left" aria-hidden="true"></i> Go to Form</a>
	</div>
</div>

<div class="container-fluid mt-4">

	<?php if(isset($message)):?>
		<div class="mt-4 mx-3 mb-2 alert alert-<?=$message['status']?> alert-dismissible fade show" role="alert">
			<?=$message['text']?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif?>

	<form action="<?=base_url()?>form/updateOtherSettings/<?=$form->id?>" class="row p-3" method="post">

		<input type="hidden" name="id" value="<?=$form->id?>">

		<div class="col-md-9 mb-5">

			<div class="card p-4 pt-5">

				<div class="card-body">

					<div class="row mb-4">
						<div class="col-md-2">
							<label class="col-form-label" for="">Email:</label>
						</div>

						<div class="col-md-10">
							<input type="text" name="email" id="email" class="form-control form-control" value="<?=$form->email?>"/>
							<div class="hint text-muted">
								<i>(The default or contact email will be used if this is left blank.)</i>
							</div>
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-2">
							<label class="col-form-label" for="">CC:</label>
						</div>

						<div class="col-md-10">
							<input type="text" name="cc" id="cc" class="form-control form-control" placeholder="email1@yahoo.com, email2@yahoo.com" value="<?=$form->cc?>"/>
							<div class="hint text-muted">
								<i>(Ex: email1@yahoo.com, email2@yahoo.com)</i>
							</div>
						</div>
					</div>

					<div class="form-group row mb-4">
						<div class="col-md-2">
							<label class="col-form-label" for="">Subject:</label>
						</div>

						<div class="col-md-10">
							<input type="text" name="subject" id="subject" class="form-control form-control" value="<?=$form->subject?>"/>
							<div class="hint text-muted">
								<i>(The form name will be used if this is left blank.)</i>
							</div>
						</div>
					</div>

					<div class="form-group row mb-4">
						<div class="col-md-2">
							<label class="col-form-label" for="">Button:</label>
						</div>

						<div class="col-md-10">
							<input type="text" name="button_text" id="button_text" class="form-control form-control" placeholder="Button Text" value="<?=$form->button_text?>"/>
						</div>
					</div>

				</div>

			</div>

		</div>

		<div class="col-md-3">
			<div class="sticky-top save-page-wrap">
				<div class="card">
					<div class="card-body">

						<h4 class="text-center mb-3">Save changes?</h4>

						<button type="submit" name="submit" class="btn btn-info btn-block"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
					</div>
				</div>
			</div>
		</div>

	</form>
</div>


