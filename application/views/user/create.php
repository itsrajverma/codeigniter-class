<main>
	<style>
		.red{
			color: red;
		}
	</style>

	<div class="row row-cols-1 row-cols-md-3 mb-3">
		<?php
		$this->load->view('includes/error');
		?>
		<div class="col-md-12">
			<a class="btn btn-primary" href="<?= base_url('user/login') ?>">Login</a>
		</div>
		<div class="col-md-6 mt-5">
				<?= form_open_multipart(base_url('user/create')) ?>
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="<?= set_value('name'); ?>" placeholder="Enter User Name">
					<?= form_error('name','<div class="red">','</div>') ?>
				</div>

				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" value="<?= set_value('email'); ?>"  placeholder="Enter User Email">
					<?= form_error('email','<div class="red">','</div>') ?>
				</div>



				<div class="form-group">
					<label>Password</label>
					<input type="text" name="password" class="form-control" value="<?= set_value('password'); ?>"  placeholder="Enter Password">
					<?= form_error('password','<div class="red">','</div>') ?>
				</div>



			<div class="form-group mt-1">
					<button type="submit" class="btn btn-info">Submit</button>
				</div>
			<?= form_close() ?>
		</div>
	</div>
</main>
