<div class="form-top px-4 py-4 row">
	<div class="col-md-9 pl-4">
		<h3 class="mb-0"><i class="fa fa-th-list" aria-hidden="true"></i> Menu Settings</h3>
	</div>

	<?php if(strpos($prev_url, 'menu/edit')):?>
		<div class="col-md-3 text-right">
			<a class="btn btn-secondary" href="<?=$prev_url?>" class=""><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
		</div>
	<?php endif?>
</div>

<div class="container-fluid mt-3 menu-settings">

	<form action="<?=base_url()?>menu/save" method="post">

		<input type="hidden" name="menu_data" id="nestable-output">
		<input type="hidden" name="page_data" id="nestable2-output">
		<input type="hidden" name="is_primary" value="<?=$is_primary?>">
		<input type="hidden" name="shortcode_menu_id" value="<?=$shortcode_menu_id?>">

		<div class="row mt-4 mb-4">
			
			<div class="col-md-3">
				<div class="sticky-top save-page-wrap">
					<div class="card">
						<div class="card-body position-relative">

							<div class="add-custom-menu">+</div>

							<h4 class="text-center">Pages</h4>

							<div class="page-list-checkbox">
								<div class="dd" id="nestable2" data-nestable-pages>
									<ol class="dd-list">
										<?php foreach($pages as $page):?>
											<li class="dd-item" data-type="page" data-id="<?=$page['id']?>" data-name="<?=$page['slug']?>-<?=$page['id']?>" data-title="<?=$page['title_alias'] ?:$page['title']?>" data-slug="<?=$page['slug']?>">
												<div class="dd-handle">
													<div class="dd-handle-text"><?=$page['title_alias'] ?:$page['title']?></div>
												</div>
											</li>
										<?php endforeach?>
									</ol>
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

							<div class="cf nestable-lists">

								<div class="dd" id="nestable" data-nestable-menus>
									<div class="dd-empty"></div>
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

							<h4 class="text-center mb-3">Create Menu</h4>
							<div class="menu-shortcode text-center hint">{menu_<span></span><?=$shortcode_menu_id?>}</div>
							<hr>

							<div class="form-group">
								<input type="text" name="menu_name" class="form-control form-control-sm" placeholder="Menu Name" required>
							</div>

							<div class="form-group">
								<input type="text" name="shortcode_menu_key" class="menu-shortcode-custom form-control form-control-sm" value="" placeholder="Add shortcode key">
							</div>

							<button type="submit" class="btn btn-info btn-sm btn-block mt-3">Create</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		

	</form>
</div>

