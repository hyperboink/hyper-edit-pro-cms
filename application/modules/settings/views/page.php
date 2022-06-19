
<div class="form-top px-4 py-4 row">
	<div class="col-md-9 pl-4">
		<h3 class="mb-0"><i class="fa fa-cog mr-2" aria-hidden="true"></i> General Settings</h3>
	</div>

	<!-- <div class="col-md-3 pr-4 text-right">
		<a class="btn btn-secondary" href="<?=$prev_url?>" class=""><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
	</div> -->
	<?php if(strpos($prev_url, 'edit')):?>
		<div class="col-md-3 text-right">
			<a class="btn btn-secondary" href="<?=$prev_url?>" class=""><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
		</div>
	<?php endif?>
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

	<form action="<?=base_url()?>settings/update" class="row p-3" method="post">

		<input type="hidden" name="id" value="<?=$id?>">
		<input type="hidden" name="user_id" value="<?=$user_id?>">

		<div class="col-md-9 mb-5">

			<div class="card p-4 pt-5">

				<div class="card-body">

					<div class="row mb-4">
						<div class="col-md-2">
							<label class="col-form-label" for="">Site Title:</label>
						</div>

						<div class="col-md-10">
							<input type="text" name="site_title" id="stite_title" class="form-control" value="<?=$site_title?>"/>
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-2">
							<label class="col-form-label" for="">Email:</label>
						</div>

						<div class="col-md-10">
							<input type="text" name="email" id="email" class="form-control" value="<?=$email?>"/>
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-2">
							<label class="col-form-label" for="">Homepage:</label>
						</div>

						<div class="col-md-10">
							<select name="default_page" id="default_page" class="form-control">
								<option value="0">Select default page</option>
								<?php foreach($pages as $page):?>
									<option value="<?=$page['slug']?>" <?=$page['slug'] == $default_page ? 'selected' : ''?>><?=$page['title']?></option>
								<?php endforeach?>
							</select>
						</div>
					</div>

					<div class="row mb-2">
						<div class="col-md-2">
							<label class="col-form-label" for="maintenance"></label>
						</div>

						<div class="col-md-10">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="maintenance" name="maintenance" <?=$maintenance ? 'checked' : ''?>>
								<label class="custom-control-label" for="maintenance">Maintenance Mode</label>
							</div>
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-2">
							<label class="col-form-label" for=""></label>
						</div>

						<div class="col-md-10">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="meta-enabled" name="meta_enabled" <?=$meta_enabled ? 'checked' : ''?>>
								<label class="custom-control-label" for="meta-enabled">Meta tags <span class="hint font-italic">(This will enable meta tags in all pages)</span></label>
							</div>
						</div>
					</div>

					<hr class="mt-5 mb-5">

					<div class="row mb-2">
						<div class="col-md-2">
							<label class="col-form-label" for="">Username:</label>
						</div>

						<div class="col-md-10 pt-2">
							<?=$username?>
						</div>
					</div>

					<div class="row mb-2">
						<div class="col-md-2">
							<label class="col-form-label" for="">Password:</label>
						</div>

						<div class="col-md-10 pt-2">
							<a href="<?=base_url()?>settings/changePassword" class="">Change password?</a>
						</div>
					</div>

					<hr class="mt-5 mb-5">

					<div class="row mb-4">
						<div class="col-md-2">
							<label class="col-form-label" for="">Google Analytics</label>
						</div>

						<div class="col-md-10">
							<textarea name="additional_script" id="additional_script" cols="30" rows="10" class="form-control"><?=$additional_script?></textarea>
						</div>
					</div>

				</div>

			</div>

		</div>

		<div class="col-md-3">
			<div class="sticky-top save-page-wrap">
				<div class="card">
					<div class="card-body">

						<h4 class="text-center mb-3">Update settings?</h4>

						<button type="submit" name="submit" class="btn btn-info btn-block"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update</button>
					</div>
				</div>
			</div>
		</div>

	</form>
</div>


