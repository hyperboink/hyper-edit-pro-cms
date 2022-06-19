<div class="form-top px-4 py-4 row">
    <div class="page-title col-md-9 pl-0">
        <h3 class="mb-0">
            <i class="fa fa-address-book-o mr-2" aria-hidden="true"></i>
            <span class="page-title-text">Contact Settings</span>
        </h3>
    </div>



</div>

<div class="container-fluid mt-4 mb-5">

<!-- 	<h3 class=" font-weight-light my-4 text-capitalize">Contact Settings</h3> -->
		
	<form action="<?=base_url()?>contact/update" class="row" method="POST">

		<div class="col-md-12">

			<?php if(isset($message)):?>
			<div class="alert alert-success" role="alert">
				<?=$message?>
			</div>
			<?php endif?>

			<input type="hidden" name="id" value="<?= $id ?? ''?>">

			<div class="row">

				<div class="col-md-6">
					<div class="form-group">
						<label class="mb-1 font-weight-bold" for="phone">Phone:</label>
						<input type="text" name="phone" id="phone" class="form-control" value="<?= $phone ?? ''?>"/>
					</div>
					 <div class="form-group">
						<label class="mb-1 font-weight-bold" for="mobile">Mobile:</label>
						<input type="text" name="mobile" id="mobile" class="form-control" value="<?= $mobile ?? ''?>"/>
					</div>
					
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label class="mb-1 font-weight-bold" for="">Fax:</label>
						<input type="text" name="fax" id="" class="form-control" value="<?= $fax ?? ''?>"/>
					</div>
					 <div class="form-group">
						<label class="mb-1 font-weight-bold" for="email">Email Address:</label>
						<input type="text" name="email" id="email" class="form-control" value="<?= $email ?? ''?>"/>
					</div>
					
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<label class="mb-1 font-weight-bold" for="address">Address:</label>
						<input type="text" name="address" id="address" class="form-control" value="<?= $address ?? ''?>"/>
					</div>

					<div class="form-group">
						<label class="mb-1 font-weight-bold" for="info">Information Text:</label>
						<textarea name="info" id="info" class="form-control" rows="5"><?= $info ?? ''?></textarea>
					</div>
				</div>

			</div>

			<button type="submit" class="btn btn-info btn-block mt-2">Save</button>

		</div>

	</form>

</div>

