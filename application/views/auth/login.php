<link rel="stylesheet" href="<?=base_url() . 'assets/admin/css/bootstrap.min.css'?>">
<link rel="stylesheet" href="<?=base_url() . 'assets/admin/css/login.css'?>">

<div class="container-fluid login">

	<div class="row justify-content-center h-100">
		<div class="col-md-6 p-0 login-img"></div>

		<div class="col-md-6 p-0 justify-content-center">

			<div class="d-flex flex-column justify-content-center align-items-center vh-100">

                <?= form_open('auth/login/validate_login', array('class'=>'login-form'))?>

                	<div class="text-center mb-3">
                		<img src="<?=base_url('assets/admin/images/logo-icon-blue.png')?>" alt="">
                	</div>
			   		<h3 class="font-weight-bold text-center mb-4"><span class="text-info">HyperEditPro</span></h3>

					<p class="errors text-danger text-center"><?=$this->session->flashdata('error')?:''?></p>

					<div class="form-group">
						<input type="text" name="username" class="form-control" placeholder="Username">
					</div>
					
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password">
					</div>

					<div class="form-group">
						<input type="submit" name="submit" class="form-control btn btn-info" value="Login">	
					</div>

				<?=form_close(); ?>

				<?=validation_errors(); ?>
            </div>
		    
		</div>
	</div>
   
</div>



<!-- 
<div class="hyperLogin">
	<div class="loginWrap st2Default">
		<div class="loginWrap st1Default">
		
			<div class="login">

				<div class="loginForm">
					<div class="loginFormIn">
						<h3>Login</h3>

						<?= form_open('auth/login/validate_login', array('class'=>'form', 'id'=>'loginform'))?>
							<p class="errors"><?=$this->session->flashdata('error')?:''?></p>
							<div><input type="text" name="username" placeholder="Username"></div>
							
							<div><input type="password" name="password" placeholder="Password"></div>
							<input type="submit" name="submit">	

						<?=form_close(); ?>
						<?=validation_errors(); ?>
					</div>

				</div>

			</div>

		</div>

	</div>

</div>
 -->