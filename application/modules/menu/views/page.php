<div class="form-top px-4 py-4 row mb-4">

	<div class="col-md-9 pl-0">
		<h3 class="mb-0"><i class="fa fa-th-list" aria-hidden="true"></i> Menu Settings</h3>
	</div>

	<div class="col-md-3">
		<select name="menu_select" class="menu-select form-control" value="<?=$id?>">
			<?php foreach($menus as $menu):?>
				<option value="<?=$menu['id']?>" <?=$menu['id'] === $id ? 'selected' : ''?>><?=$menu['name']?></option>			
			<?php endforeach?>
		</select>
	</div>
</div>

<div class="container-fluid mt-3">

	<form action="<?=base_url()?>menu/update/<?=$id?>" method="post" data-base-url="<?=base_url()?>">

		<input type="hidden" name="menu_data" id="nestable-output">
		<input type="hidden" name="page_data" id="nestable2-output">
		<input type="hidden" name="shortcode_menu_id" value="<?=$shortcode_menu_id?>">
		<!-- <input type="hidden" name="shortcode_menu_key" class="shortcode-menu-key"> -->

		<div class="row mt-4 mb-4">

			<div class="col-md-3">
				<div class="sticky-top save-page-wrap">
					<div class="card">
						<div class="card-body">

							<div class="add-custom-menu">+</div>

							<h4 class="text-center">Pages</h4>

							<div class="page-list-checkbox overflow-hidden">

								<!-- <div class="dd" id="nestable2">

									<?php if(count($page_data)):?>
										<ol class="dd-list">
											<?php foreach($page_data as $level1):?>
												<li class="dd-item" data-id="<?=$level1->id?>" data-title="<?=$level1->title?>" data-slug="<?=$level1->slug?>">
													<div class="dd-handle">
														<div class="dd-handle-text"><?=$level1->title?></div>
													</div>

													<?php if(isset($level1->children) && count($level1->children)):?>
														<ol class="dd-list">
															<?php foreach($level1->children as $level2):?>
															<li class="dd-item" data-id="<?=$level2->id?>" data-title="<?=$level2->title?>" data-slug="<?=$level2->slug?>">

																<div class="dd-handle">
																	<div class="dd-handle-text">
																		<div class="dd-handle-text"><?=$level2->title?></div>
																	</div>
																</div>

																<?php if(isset($level2->children) && count($level2->children)):?>
																	<ol class="dd-list">
																		<?php foreach($level2->children as $level3):?>
																		<li class="dd-item" data-id="<?=$level3->id?>" data-title="<?=$level3->title?>" data-slug="<?=$level3->slug?>">
																			<div class="dd-handle">
																				<div class="dd-handle-text"><?=$level3->title?></div>
																			</div>

																			<?php if(isset($level3->children) && count($level3->children)):?>
																				<ol class="dd-list">
																					<?php foreach($level3->children as $level4):?>
																					<li class="dd-item" data-id="<?=$level4->id?>" data-title="<?=$level4->title?>" data-slug="<?=$level4->slug?>">
																						<div class="dd-handle">
																							<div class="dd-handle-text"><?=$level4->title?></div>
																						</div>

																						<?php if(isset($level4->children) && count($level4->children)):?>
																							<ol class="dd-list">
																								<?php foreach($level4->children as $level5):?>
																								<li class="dd-item" data-id="<?=$level5->id?>" data-title="<?=$level5->title?>" data-slug="<?=$level5->slug?>">
																									<div class="dd-handle">
																										<div class="dd-handle-text"><?=$level5->title?></div>
																									</div>
																								</li>
																								<?php endforeach?>
																							</ol>
																						<?php endif?>
																					</li>
																					<?php endforeach?>
																				</ol>
																			<?php endif?>
																		</li>
																		<?php endforeach?>
																	</ol>
																<?php endif?>
															</li>
															<?php endforeach?>
														</ol>
													<?php endif?>
												</li>
											<?php endforeach?>
										</ol>
									<?php else:?>
										<div class="dd-empty"></div>
									<?php endif?>

									</ol>

								</div> -->

								<div class="dd" id="nestable2" data-nestable-pages>
									<?php if(count(array_merge($page_data, $page_data_added))):?>
										<?=menu(array_merge($page_data, $page_data_added))?>
									<?php else:?>
										<div class="dd-empty"></div>
									<?php endif?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 mb-5">

				<div class="sticky-top gap">
					<div class="card menu-card">
						<div class="card-body">

							<h4 class="text-center mb-3">Menu Items</h4>

							<!-- <?php if($menu['is_primary']):?>
								<span class="badge badge-info">primary</span>
							<?php endif?> -->

							<div class="cf nestable-lists">

								<div class="dd" id="nestable">

									<?php if(count($menu_data)):?>
										<?=menu($menu_data)?>
									<?php else:?>
										<div class="dd-empty"></div>
									<?php endif?>

									</ol>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="sticky-top gap">
					<div class="menu-card card">
						<div class="card-body">

							<h4 class="text-center mb-3">Settings</h4>

							<div class="menu-shortcode text-center hint">{menu_<span><?=$shortcode_menu_key?></span><?=$shortcode_menu_id?>}</div>

							<hr>

							<div class="form-group">
								<input type="text" name="menu_name" class="form-control form-control-sm" placeholder="Menu Name" value="<?=$menu_name?>" required>
							</div>

							<div class="form-group">
								<input type="text" name="shortcode_menu_key" class="menu-shortcode-custom form-control form-control-sm" value="<?=$shortcode_menu_key?>" placeholder="Add shortcode key">
							</div>

							<button type="submit" class="btn btn-info btn-sm btn-block mt-3">Update</button>

							<hr>

						</div>
					</div>
					<div class="delete-menu-btn text-center mt-2">
						<a href="<?=base_url()?>menu/create" class="text-info">Create</a>
						<span>|</span>
						<a href="#" class="text-danger" data-toggle="modal" data-target="#confirm-delete-menu">Delete</a>
					</div>
				</div>
			</div>

		</div>
		

	</form>
</div>

<div class="modal fade" id="confirm-delete-menu" tabindex="-1" role="dialog" aria-labelledby="delete-menu-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-body text-center">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>

			<p class="modal-title mb-3 mt-3" id="delete-menu-label">Are you sure you want to delete this menu?</p>

			<div class="mb-3">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a href="<?=base_url()?>menu/delete/<?=$id?>" class="btn btn-danger">Delete</a>
			</div>
		</div>
    </div>
  </div>
</div>