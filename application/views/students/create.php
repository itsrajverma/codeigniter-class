<main>
	<div class="row row-cols-1 row-cols-md-3 mb-3">
		<div class="col-md-12">
			<a class="btn btn-primary" href="<?= base_url('student') ?>">Go Back</a>
		</div>
		<div class="col-md-6 mt-5">
			<form method="post" action="<?= base_url('student/insertStudent') ?>">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" placeholder="Enter Student Name">
				</div>

				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" placeholder="Enter Student Email">
				</div>

				<div class="form-group">
					<label>Mobile</label>
					<input type="tel" name="mobile" class="form-control" placeholder="Enter Student Mobile">
				</div>

				<div class="form-group">
					<label>Class</label>
					<input type="text" name="class" class="form-control" placeholder="Enter Student Class">
				</div>

				<div class="form-group">
					<label>Address</label>
					<input type="text" name="address" class="form-control" placeholder="Enter Student Address">
				</div>

				<div class="form-group mt-1">
					<button type="submit" class="btn btn-info">Submit</button>
				</div>
			</form>
		</div>
	</div>
</main>
