<main>
	<style>
		.red{
			color: red;
		}
	</style>
	<div class="row row-cols-1 row-cols-md-3 mb-3">
		<div class="col-md-12">
			<a class="btn btn-primary" href="<?= base_url('student') ?>">Go Back</a>
		</div>
		<div class="col-md-6 mt-5">
				<?= form_open(base_url('student/edit/').$values->id) ?>
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="<?= !empty($values) ? $values->name :  set_value('name'); ?>" placeholder="Enter Student Name">
					<?= form_error('name','<div class="red">','</div>') ?>
				</div>

				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" value="<?= !empty($values) ? $values->email :   set_value('email'); ?>"  placeholder="Enter Student Email">
					<?= form_error('email','<div class="red">','</div>') ?>
				</div>

				<div class="form-group">
					<label>Mobile</label>
					<input type="tel" minlength="10" maxlength="10" name="mobile" class="form-control" value="<?= !empty($values) ? $values->phone	 :   set_value('mobile'); ?>"  placeholder="Enter Student Mobile">
					<?= form_error('mobile','<div class="red">','</div>') ?>
				</div>

				<div class="form-group">
					<label>Class</label>
					<input type="text" name="class" class="form-control" value="<?= !empty($values) ? $values->class :  set_value('class'); ?>"  placeholder="Enter Student Class">
					<?= form_error('class','<div class="red">','</div>') ?>
				</div>

				<div class="form-group">
					<label>Address</label>
					<input type="text" name="address" class="form-control" value="<?= !empty($values) ? $values->address :   set_value('address'); ?>"  placeholder="Enter Student Address">
					<?= form_error('address','<div class="red">','</div>') ?>
				</div>

				<div class="form-group mt-1">
					<button type="submit" class="btn btn-info">Update</button>
				</div>
			<?= form_close() ?>
		</div>
	</div>
</main>
