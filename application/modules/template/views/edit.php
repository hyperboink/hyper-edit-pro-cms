<div class="form-top px-4 py-4 row mb-4">
	<div class="col-md-9 pl-0">
		<h3 class="mb-0"><i class="fa fa-file-o mr-2" aria-hidden="true"></i> <?=$title?></h3>
	</div>
</div>

<div class="container-fluid mt-3">
	
	<div class="view-page-box breadcrumb mb-4 mt-4">
		<span class="mr-1">Link: </span>
		<a href="<?=base_url()?><?=$slug != $this->config->item('default_page') ? $slug : ''?>" target="_blank">
			<?=base_url()?><?=$slug != $this->config->item('default_page') ? $slug : ''?>
		</a>
	</div>

	<?php if(isset($message)):?>
		<div class="alert alert-<?=$message['status']?> alert-dismissible fade show" role="alert">
			<?=$message['text']?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif?>

	<form action="<?=base_url()?>template/update/<?=$id?>" class="row" method="POST" enctype="multipart/form-data" method="post" accept-charset="utf-8">

		<div class="col-md-9 mb-5">

			<?php if($setting->meta_enabled):?>
				<div class="card mb-4">
					<div class="card-body">
						<div class="form-group">
							<label class="mb-2 font-weight-bold" for="meta-keywords">Meta Keywords:</label>
							<input type="text" name="meta_keywords" id="meta-keywords" class="form-control" placeholder="Keywords separated by comma(,)" value="<?=$meta_keywords?>"/>
						</div>
						<div class="form-group">
							<label class="mb-2 font-weight-bold" for="meta-description">Meta Description:</label>
							<input type="text" name="meta_description" id="meta-description" class="form-control" value="<?=$meta_description?>"/>
						</div>
					</div>
				</div>
			<?php endif?>

			<?php if(isset($content) && count(filter_data($content, 'status', 'first'))):?>

				<div class="card card-page-content">

					<div class="card-body">

						<?php foreach(filter_data($content, 'status', 'first') as $key => $data):?>

							<input type="hidden" name="<?=$key?>_status" value="<?=$data['status']?>">

							<?php if($data['type'] == 'title'):?>
								<div class="form-group">
									<label class="mb-2 font-weight-bold" for="<?=$key?>"><?=$data['title']?> Title:</label>
									<input type="text" name="<?=$key?>" id="<?=$key?>" class="form-control" value="<?=$data['value']?>"/>
								</div>
							<?php endif?>

							<?php if($data['type'] == 'content'):?>
								<div class="form-group">
									<label class="mb-2 font-weight-bold" for="<?=$key?>"><?=$data['title']?> Content:</label>
									<textarea name="<?=$key?>" id="<?=$key?>" class="form-control mce-input"  rows="5"><?=$data['value']?></textarea>
								</div>
							<?php endif?>

							<?php if($data['type'] == 'custom-google-map'):?>
								<div class="form-group">
									<label class="mb-2 font-weight-bold" for="<?=$key?>">Google Map <?=$data['title']?> Location:</label>
									<input type="text" name="<?=$key?>" id="<?=$key?>" class="form-control" value="<?=$data['value']?>"/>
								</div>
							<?php endif?>

							<?php if($data['type'] == 'image'):?>

								<div class="form-group">
									<label class="mb-2 font-weight-bold"><?=$data['title']?> Image:</label>

									<div class="row input-file-con">
										<div class="col-md-2">
											<div class="custom-file">
												
												<div class="image-output" style="background-image: <?= $data['value'] ? 'url('.base_url().'uploads/'.$data['value']['name'].'-'.$data['value']['dimension'].$data['value']['ext'].')' : 'none' ?>"></div>

												<img src="<?=base_url()?>assets/admin/images/image.jpg" width="65" height="65">

												<input type="file" name="<?=$key?>" class="custom-file-input">
											</div>
										</div>

										<div class="col-md-8 pl-0">
											<div class="d-flex h-100">
												<div class="image-name justify-content-center align-self-center"><?=$data['value'] ? $data['value']['name'].$data['value']['ext'] : 'No image chosen.'?></div>
											</div>
										</div>

										<div class="col-md-2">
											<div class="d-flex h-100 justify-content-end">
												<div class="image-delete align-self-center">
													<input type="hidden" name="<?=$key?>_reset" class="custom-file-reset">
													<span class="btn btn-secondary file-reset-btn">Reset</span>
												</div>
											</div>
										</div>

										<input type="hidden" name="<?=$key?>_current_image" class="form-control current-image" data-image="<?=$data['value'] ? $data['value']['name'].$data['value']['ext'] : ''?>">
									</div>
									
								</div>
							<?php endif?>

							<?php if($data['type'] == 'gallery'):?>

								<div class="form-group">

									<label class="mb-2 font-weight-bold"><?=$data['title']?> Gallery:</label>

									<div class="gallery-input-wrap input-file-group rounded-top" data-gallery="<?=$key?>">

										<?php if(isset($data['value']) && count($data['value'])):?>

											<?php foreach($data['value'] as $g_key => $gallery):?>

												<div class="input-gallery-con row input-file-con rounded-0">
													<div class="col-md-2">
														<div class="custom-file">
															<div class="image-output" style="background-image: url(<?=base_url() . 'uploads/' . ($gallery['g_image'] ? $gallery['g_image_prop']['name'].'-'.$gallery['g_image_prop']['dimension'].$gallery['g_image_prop']['ext'] : '')?>"></div>

															<img src="<?=base_url()?>assets/admin/images/image.jpg" width="65" height="65">

															<input type="file" name="<?=$key?>_image_<?=$g_key?>" class="gallery-file-input custom-file-input">
														</div>
													</div>

													<div class="col-md-8 pl-0">
														<div class="d-flex h-100">
															<div class="gallery-title-con justify-content-center align-self-center">
																<input type="text" name="<?=$key?>_title[<?=$g_key?>]" class="form-control gallery-title-input" placeholder="Title" value="<?=$gallery['g_title'] ?? ''?>">
															</div>
														</div>
													</div>

													<div class="col-md-2">
														<div class="d-flex h-100 justify-content-end">
															<div class="image-delete align-self-center">
																	<div class="btn btn-danger gallery-delete-btn" data-index="<?=$g_key?>">Delete</div>
															</div>
														</div>
													</div>
												</div>

											<?php endforeach?>

										<?php else:?>

											<div class="input-gallery-con row input-file-con rounded-0">
												<div class="col-md-2">
													<div class="custom-file">
														<div class="image-output"></div>

														<img src="<?=base_url()?>assets/admin/images/image.jpg" width="65" height="65">

														<input type="file" name="<?=$key?>_image_0" class="gallery-file-input custom-file-input">
													</div>
												</div>

												<div class="col-md-8 pl-0">
													<div class="d-flex h-100">
														<div class="gallery-title-con justify-content-center align-self-center">
															<input type="text" name="<?=$key?>_title[0]" class="form-control gallery-title-input" placeholder="Title" value="">
														</div>
													</div>
												</div>

												<div class="col-md-2">
													<div class="d-flex h-100 justify-content-end">
														<div class="image-delete align-self-center">
																<div class="btn btn-danger gallery-delete-btn">Delete</div>
														</div>
													</div>
												</div>
											</div>
										<?php endif?>

									</div>

									<div class="add-gallery-wrap p-3 text-center rounded-bottom bg-light border-top-0">
										<div class="add-gallery btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</div>
										<div class="save-note hint text-center mt-2 text-muted"> (Don't forget to click save or your data will be lost.)</div>
									</div>

									<?php if(isset($data['value']) && count($data['value'])):?>
										<?php foreach($data['value'] as $g_key => $gallery):?>
											<input type="hidden" name="<?=$key?>_current_image[<?=$g_key?>]" class="form-control gallery-current-image current-image-<?=$g_key?>" data-image="<?=($gallery['g_image'] ? $gallery['g_image_prop']['name'].$gallery['g_image_prop']['ext'] : '')?>">
										<?php endforeach?>
									<?php endif?>
									
								</div>

							<?php endif?>


						<?php endforeach?>

					</div>
				</div>

			<?php else:?>

				<div class="card border-gray text-info">
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
								<input type="checkbox" class="custom-control-input" id="page-status" name="page_status" <?=$status ? 'checked' : '' ?> value="<?=$status?>">
								<label class="custom-control-label" for="page-status">Enable Page</label>
							</div>
							
						</div>

						<button type="submit" class="btn btn-info btn-block">Save</button>
					</div>
				</div>
			</div>
		</div>

	</form>
</div>

