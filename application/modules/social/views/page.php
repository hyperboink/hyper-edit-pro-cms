
<div class="container-fluid">

	
	
	<form action="<?=base_url()?>social/create" class="row" method="POST">

		<div class="col-md-12">
			<h3 class=" font-weight-light my-4 text-capitalize float-left">Social Settings</h3>
			
		</div>

		<div class="col-md-12">

				<div class="card mb-4">

					<div class="card-body">
						<?php if(isset($message)):?>
						<div class="alert alert-success" role="alert">
							<?=$message?>
						</div>
						<?php endif?>

						<div class="row mx-2 my-2">

							<?php if(count($socials)):?>

								<?php foreach($socials as $social):?>
									<div class="social-box card-body border border-gray col-md-4">
										<div class="form-group">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="<?=$social['name']?>" name="<?=$social['name']?>" value="<?=$social['status'] ?? 0?>" <?=$social['status'] ? 'checked' : ''?>>
												<label class="custom-control-label text-capitalize font-weight-bold mb-1" for="<?=$social['name']?>"><?=$social['name']?></label>
											</div>
											
											<input type="text" name="<?=$social['name']?>_url" class="form-control form-control-sm" value="<?=$social['url'] ?? ''?>"/>
										</div>
									</div>

								<?php endforeach?>

							<?php else:?>

								<div class="social-box card-body border border-gray col-md-4">
									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="facebook" name="facebook" value="<?=$facebook ?? 0?>">
											<label class="custom-control-label text-capitalize font-weight-bold mb-1" for="facebook">Facebook</label>
										</div>
										
										<input type="text" name="facebook_url" class="form-control form-control-sm" value=""/>
									</div>
								</div>

								<div class="social-box card-body border border-gray col-md-4">
									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="twitter" name="twitter" value="1">
											<label class="custom-control-label text-capitalize font-weight-bold mb-1" for="twitter">Twitter</label>
										</div>
										<input type="text" name="twitter_url" class="form-control form-control-sm" value=""/>
									</div>
								</div>

								<div class="social-box card-body border border-gray col-md-4">
									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="instagram" name="instagram" value="<?=$instagram ?? 0?>">
											<label class="custom-control-label text-capitalize font-weight-bold mb-1" for="instagram">Instagram</label>
										</div>
										<input type="text" name="instagram_url" class="form-control form-control-sm" value=""/>
									</div>
								</div>

								<div class="social-box card-body border border-gray col-md-4">
									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="googleplus" name="googleplus" value="<?=$googleplus ?? 0?>">
											<label class="custom-control-label text-capitalize font-weight-bold mb-1" for="googleplus">Google Plus</label>
										</div>
										<input type="text" name="googleplus_url" class="form-control form-control-sm" value=""/>
									</div>
								</div>

								<div class="social-box card-body border border-gray col-md-4">
									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="youtube" name="youtube" value="<?=$youtube ?? 0?>">
											<label class="custom-control-label text-capitalize font-weight-bold mb-1" for="youtube">Youtube</label>
										</div>
										<input type="text" name="youtube_url" class="form-control form-control-sm" value=""/>
									</div>
								</div>

								<div class="social-box card-body border border-gray col-md-4">
									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="linkedin" name="linkedin" value="<?=$linkedin ?? 0?>">
											<label class="custom-control-label text-capitalize font-weight-bold mb-1" for="linkedin">Linkedin</label>
										</div>
										<input type="text" name="linkedin_url" class="form-control form-control-sm" value=""/>
									</div>
								</div>

								<div class="social-box card-body border border-gray col-md-4">
									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="pinterest" name="pinterest" value="<?=$pinterest ?? 0?>">
											<label class="custom-control-label text-capitalize font-weight-bold mb-1" for="pinterest">Pinterest</label>
										</div>
										<input type="text" name="pinterest_url" class="form-control form-control-sm" value=""/>
									</div>
								</div>

								<div class="social-box card-body border border-gray col-md-4">
									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="vimeo" name="vimeo" value="<?=$vimeo ?? 0?>">
											<label class="custom-control-label text-capitalize font-weight-bold mb-1" for="vimeo">Vimeo</label>
										</div>
										<input type="text" name="vimeo_url" class="form-control form-control-sm" value=""/>
									</div>
								</div>

								<div class="social-box card-body border border-gray col-md-4">
									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="tumblr" name="tumblr" value="<?=$tumblr ?? 0?>">
											<label class="custom-control-label text-capitalize font-weight-bold mb-1" for="tumblr">Tumblr</label>
										</div>
										<input type="text" name="tumblr_url" class="form-control form-control-sm" value=""/>
									</div>
								</div>

							<?php endif?>

						</div>

					</div>

				</div>

				<button type="submit" class="btn btn-info mb-2 float-right">Save</button>

		</div>

	</form>
</div>


<!-- 
<div class="rightPanel">

	<div class="hyperFormDivWrap settings">
		<div class="hyperFormDiv socialF">
			<div class="hyper-head-con clear">
				<h3 class="secTitleAdmin left">Social Settings</h3>
				<a href="#" class="back right" data-modal-trigger="modalSocial">&larr; Add Social Media</a>
			</div>
			<?=form_open_multipart('social/update_social',array('class'=>'formSocial formDiv', 'data-sortable' => ''))?>

				{social}
					<div class="inputTxt socialForm" draggable="true">					
						<input type="hidden" name="social_id[{id}]" value="{id}">
						<input type="hidden" name="social_title_1" value="{social_title}">
						<input type="hidden" class="index-order" name="social_order_{id}" value="{id}">
						<div class="socLabel">
							<div class="socTitle">
								<input type="checkbox" id="checkbox{id}" name="social_status_{id}" class="mCheckbox" value="{social_status}">
								<label for="checkbox{id}">{social_title}</label>
							</div>							
						</div>
						
						<div class="socCon">
							<div class="file-upload-wrap social-icon">
								<div class="file-upload">
									<img src="<?=base_url()?>uploads/thumbnails/{social_image}" class="thumb"/>
									<input type="file" name="social_image_{id}"  value=""/>
								</div>
							</div>
							<input type="text" name="social_link_{id}" class="socialInput social-link" value="{social_link}"/>

							<a href="<?=base_url()?>social/delete_social/{id}" class="social-delete">x</a>

						</div>
						
							
					</div>
				{/social}

				<div class="inputSubmit">
					<input type="submit" class="savea btn" value="Save Settings">
				</div>
			<?=form_close()?>
				
			<div class="hypermodal" data-modal="modalSocial">

				<div class="hypermodal-inner modal-from-top">
					<?=form_open_multipart('social/create_social',array('class'=>'formSocial formDiv'))?>

						<h3 class="txt-center">Add Social Media</h3>

						<div class="inputTxt socialForm">\

							<input type="hidden" name="social_status" class="mCheckbox" value="1">
							<input type="hidden" class="index-order" name="social_order" value="">						

							<div class="socLabel">
								<div class="socTitle">
									<input type="text" placeholder="Enter Title" name="social_title" class="mCheckbox" value="">
								</div>							
							</div>
							
							<div class="socCon">
								<div class="file-upload-wrap social-icon">
									<div class="file-upload">
										<img src="<?=base_url()?>uploads/thumbnails/nothing.jpg" class="thumb"/>
										<input type="file" name="social_image"  value=""/>
									</div>
								</div>
								<input type="text" name="social_link" placeholder="Enter link" class="socialInput" value=""/>
							</div>


							
								
						</div>

						<div class="inputSubmit">
							<input type="submit" class="savea btn" value="Save Settings">
						</div>
					<?=form_close()?>
				</div>
				

			</div>
			



		</div>
	</div>

	

</div>










 -->