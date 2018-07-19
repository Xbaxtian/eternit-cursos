<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row align-items-center">
	<div class="card col-8 mx-auto my-5">
		<div class="card-body">
			<?=form_open('home/formulario', array('class'=>'col-auto'))?>
			<div class="form-group row">
				<label for="inputUser" class="col-2 col-form-label">User</label>
				<div class="col-10">
					<input type="text" class="form-control" name="user" id="inputUser" placeholder="User" value="<?=set_value('user')?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPass" class="col-2 col-form-label">Password</label>
				<div class="col-10">
					<input type="password" class="form-control" name="pass" id="inputPass" placeholder="Password" value="<?=set_value('pass')?>">
				</div>
			</div>
			<div class="form-row">
				<div class="col-auto mx-auto">
					<input type="submit" class="btn btn-dark" value="Login">
				</div>
			</div>
			<?=form_close()?>
		</div>
	</div>
</div>
