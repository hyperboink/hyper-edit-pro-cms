<link href="<?=base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url()?>assets/admin/css/form.css" rel="stylesheet">

<!-- Options Modal -->
<div class="modal fade modal-form-settings" id="options_modal" tabindex="-1" role="dialog" aria-labelledby="options_modal_label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="options_modal_label">Field Settings</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" id="save_options">Done</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>

<form action="<?=base_url()?>form/save" method="POST">

	<input type="hidden" name="shortcode_form_id" class="form-shortcode-id-data" value="<?=$shortcode_form_id?>">
	<input type="hidden" name="name" class="form-name-data" value="<?=$shortcode_form_id?>">
	<!-- <input type="hidden" name="shortcode" class="form-shortcode-data" value="form_<?=$shortcode_form_id?>"> -->
	<input type="hidden" name="shortcode_form_key" class="form-shortcode-key-data" value="">

	<!-- <div class="form-top px-4 py-4">
		<div id="content_form_name" class="form-title-wrap mb-2" data-field>
			<h3 class="form-title-tab form-label">Sample form name</h3>
			<span class="form-hint">| click to edit</span>
		</div>

		<div class="form-shortcode">{form_<span></span><?=$shortcode_form_id?>}</div>
	</div> -->

	<div class="form-top px-3 py-4 row">
		<div class="col-md-9">
			<div id="content_form_name" class="form-title-wrap mb-2" data-field>
				<h3 class="form-title-tab form-label">Sample form name</h3>
				<span class="form-hint">| click to edit</span>
			</div>

			<div class="form-shortcode">{form_<span></span><?=$shortcode_form_id?>}</div>
		</div>

		<?php if(strpos($prev_url, 'edit')):?>
			<div class="col-md-3 text-right mt-3">
				<a class="btn btn-secondary" href="<?=$prev_url?>" class=""><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
			</div>
		<?php endif?>
	</div>

	<div class="form-body py-3 px-4">
		<div class="form-body-con">
			<div class="row">

				<div class="col-sm-6 col-md-2">

					<div class="border-0">

							<div class="text-center mb-3">Components</div>

							<div id="components-container" class="form-horizontal">

								<div class="component-box component-form-box">
									<span class="component-title">form</span>

									<div class="component form-group" data-type="title">
										<label class="control-label" for="title_input">
											<span class="field-title">Sample label here (click to edit)</span>
										</label>
										<div class="controls">
											<input type="text" placeholder="placeholder" class="form-control">
										</div>
										<input type="text">
									</div>

									<div class="options options-title form-horizontal edit-fields">
										<div class="form-group row">
											<label class="control-label col-sm-3">Form Name</label>
											<div class="controls col-sm-9">
												<input type="text" class="options_title_name form-control title_input" placeholder="Form Name">
											</div>
										</div>

										<div class="form-group row">
											<label class="control-label col-sm-3">Shortcode</label>
											<div class="controls col-sm-9">
												<input type="text" class="options_title_shortcode form-control form-shortcode" placeholder="Shortcode">
											</div>
										</div>
									</div>
								</div>

								<div class="component-box">
									<span class="component-title">Text</span>

									<div class="component form-group" data-type="text" data-field>

										<label class="control-label form-label" for="text_input">
											<span>Sample label here (click to edit)</span>
										</label>

										<div class="controls">
											<input type="text" placeholder="placeholder" class="form-control form-text">
										</div>

									</div>

									<div class="options options-text form-horizontal edit-fields">

										<div class="form-group row">
											<label class="control-label col-sm-3">Label</label>
											<div class="controls col-sm-9">
												<input type="text" class="options_text_label form-control " placeholder="Label">
											</div>
										</div>

										<div class="form-group row">
											<label class="control-label col-sm-3">Custom Type</label>
											<div class="controls col-sm-9">
												<select class="options_text_custom_type form-control">
													<option value="text">Text</option>
													<option value="email">Email</option>
													<option value="number">Number</option>
													<option value="date-time">Date & Time</option>
													<option value="date">Date</option>
													<option value="time">Time</option>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="control-label col-sm-3">Placeholder</label>
											<div class="controls col-sm-9">
												<input type="text" class="options_text_placeholder form-control" placeholder="Placeholder">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-3"></div>
											<div class="controls col-sm-9">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input options_text_required" id="form-label-status" name="label_hidden">
													<label class="custom-control-label" for="form-label-status">Required</label>
												</div>
											</div>
										</div>

									</div>
								</div>
								
								<div class="component-box">
									<span class="component-title">Textarea</span>

									<div class="component form-group" data-type="textarea" data-field>
										<label class="control-label form-label" for="textarea">
											<span>Sample label here (click to edit)</span>
										</label>
										<div class="controls">
											<textarea name="textarea_input" class="form-control form-text" rows="4" placeholder="placeholder"></textarea>
										</div>

									</div>

									<div class="options options-textarea form-horizontal edit-fields">

										<div class="form-group row">
											<label class="control-label col-sm-3">Label</label>
											<div class="controls col-sm-9">
												<input type="text" class="options_textarea_label form-control form-textarea-label" placeholder="Label">
											</div>
										</div>

										<div class="form-group row">
											<label class="control-label col-sm-3">Placeholder</label>
											<div class="controls col-sm-9">
												<input type="text" class="options_textarea_placeholder form-control form-text-placeholder" placeholder="Placeholder">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-3"></div>
											<div class="controls col-sm-9">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input options_textarea_required" id="form-label-status" name="label_hidden">
													<label class="custom-control-label" for="form-label-status">Required</label>
												</div>
											</div>
										</div>
									</div>

								</div>

								<div class="component-box">
									<span class="component-title">Select</span>

									<div class="component form-group" data-type="select_basic" data-field>
										<label class="control-label form-label" for="select_basic">
											<span>Sample label here (click to edit)</span>
										</label>

										<div class="controls">
											<select name="basic_multiple" class="select_basic form-control" name="select_basic">
												<option value="1">Option 1</option>
												<option value="2">Option 2</option>
												<option value="3">Option 3</option>
											</select>
										</div>

									</div>

									<div class="options options-select_basic form-horizontal edit-fields">

										<div class="form-group row">
											<label class="control-label col-sm-3">Label</label>
											<div class="controls col-sm-9">
												<input type="text" class="options_select_basic_label form-control form-select-label" placeholder="Label">
											</div>
										</div>

										<div class="form-group row">
											<label class="control-label col-sm-3">Options</label>
											<div class="controls col-sm-9">
												<textarea class="options_select_basic_options form-control form-select" placeholder="Options" rows="5"></textarea>
												<span class="help-block">
													(Enter each option on a new line. If you want the value to be different to the displayed 
													text, enter the value followed by '=' and the option text. Eg: value_1=Option 1_.)
												</span>
											</div>
										</div>
									</div>
								</div>

								<div class="component-box">
									<span class="component-title">Checkbox</span>

									<div class="component form-group" data-type="checkbox" data-field>
										<label class="control-label">
											<span>Sample label here (click to edit)</span>
										</label>

										<div class="controls">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="checkbox" value="1">
													Option 1
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" name="checkbox" value="2"> Option 2
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" name="checkbox" value="3"> Option 3
												</label>
											</div>
										</div>

									</div>

									<div class="options options-checkbox form-horizontal edit-fields">
										<div class="form-group row">
											<label class="control-label col-sm-3">Label</label>
											<div class="controls col-sm-9">
												<input type="text" class="options_checkbox_label form-control form-checkbox-label" placeholder="Label">
											</div>
										</div>

										<div class="form-group row">
											<label class="control-label col-sm-3">Options</label>
											<div class="controls col-sm-9">
												<textarea class="options_checkbox_options form-control form-checkbox" placeholder="Options" rows="5"></textarea>
												<span class="help-block">
													(Enter each option on a new line. If you want the value to be different to the displayed 
													text, enter the value followed by '=' and the option text. Eg: value_1=Option 1).
												</span>
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-3"></div>
											<div class="controls col-sm-9">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input options_checkbox_required" id="form-label-status" name="label_hidden">
													<label class="custom-control-label" for="form-label-status">Required</label>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="component-box">
									<span class="component-title">Radio</span>

									<div class="component form-group" data-type="radio" data-field>
										<label class="control-label">
											<span>Sample label here (click to edit)</span>
										</label>

										<div class="controls">
											<div class="radio">
												<label>
													<input type="radio" name="radio" value="1"> Option 1
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="radio" value="2"> Option 2
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="radio" value="3"> Option 3
												</label>
											</div>
										</div>

									</div>

									<div class="options options-radio form-horizontal edit-fields">

										<div class="form-group row">
											<label class="control-label col-sm-3">Label</label>
											<div class="controls col-sm-9">
												<input type="text" class="options_radio_label form-control form-radio-label" placeholder="Label">
											</div>
										</div>

										<div class="form-group row">
											<label class="control-label col-sm-3">Options</label>
											<div class="controls col-sm-9">
												<textarea class="options_radio_options form-control form-radio" placeholder="Options" rows="5"></textarea>
												<span class="help-block">
													(Enter each option on a new line. If you want the value to be different to the displayed 
													text, enter the value followed by '=' and the option text. Eg: value_1=Option 1).
												</span>
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-3"></div>
											<div class="controls col-sm-9">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input options_radio_required" id="form-label-status" name="label_hidden">
													<label class="custom-control-label" for="form-label-status">Required</label>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="component-box">
									<span class="component-title">File</span>

									<div class="component form-group" data-type="file" data-field>
										<label class="control-label form-label">
											<span>Sample label here (click to edit)</span>
										</label>

										<div class="controls">
											<input type="file" name="file" class="file_input form-control">
										</div>

									</div>

									<div class="options options-text form-horizontal edit-fields">

										<div class="form-group row">
											<label class="control-label col-sm-3">Label</label>
											<div class="controls col-sm-9">
												<input type="text" class="options_file_label form-control form-file-label" placeholder="Label">
											</div>
										</div>

									</div>
								</div>

								<div class="component-box">
									<span class="component-title">Static Text</span>
									<div class="component form-group" data-type="static_text" data-field>
										<label class="control-label form-label">
											<span>Sample label here:</span>
										</label>

										<div class="controls form-value">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										</div>

									</div>

									<div class="options options-static_text form-horizontal edit-fields">
										<div class="form-group row">
											<label class="control-label col-sm-3">Label</label>
											<div class="controls col-sm-9">
												<input type="text" class="options_static_text_label form-control form-static-text-label" placeholder="Label">
											</div>
										</div>

										<div class="form-group row">
											<label class="control-label col-sm-3">Text</label>
											<div class="controls col-sm-9">
												<textarea class="options_static_text_text form-control form-static-text" rows="5" placeholder="Text"></textarea>
												<span class="help-block">
													(Enter text or valid HTML markup).
												</span>
											</div>
										</div>
									</div>
								</div>

							</div>

					</div>
				</div>

				<div class="component-wrap col-sm-6 col-md-7 mb-4">

					<div class="tabbable">

						<div class="tab-content">
							<div class="tab-pane active" id="editor-tab">
								<div class="text-center mb-3">Click / Drag Components here.</div>
								<div id="content" class="form-horizontal py-4"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3 form-page-card-save">
					<div class="sticky-top save-page-wrap">
						<div class="card">
							<div class="card-body">

								<h4 class="text-center">Create form?</h4>

								<div class="form-group mt-4 mb-1">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="form-label-setting" name="label_hidden">
										<label class="custom-control-label" for="form-label-setting">Hide Labels</label>
									</div>
								</div>

								<div class="form-group mt-1 mb-4">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="form-placeholder-setting" name="placeholder_hidden">
										<label class="custom-control-label" for="form-placeholder-setting">Hide Placeholders</label>
									</div>
								</div>

								<button type="submit" name="submit" class="btn btn-info btn-block"><i class="fa fa-floppy-o" aria-hidden="true"></i> Create</button>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</form>

<script src="<?=base_url()?>assets/admin/js/jquery.min.js"></script>
<script src="<?=base_url()?>assets/admin/js/jquery-ui.min.js"></script>
<script src="<?=base_url()?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/admin/js/form_builder.js"></script>
<script src="<?=base_url()?>assets/admin/js/scripts.js"></script>
