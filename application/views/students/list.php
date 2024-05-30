<main>
	<div class="row row-cols-1 row-cols-md-3 mb-3">
		<div class="col-md-12">
			<a class="btn btn-primary" href="<?= base_url('student/create') ?>">Add New Student</a>
		</div>
		<?php
		$this->load->view('includes/error');
		?>
			<div class="col-md-12">
			<table class="table table-responsive">
				<thead>
				<th>Name</th>
				<th>Image</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Class</th>
				<th>Address</th>
				<th>Action</th>
				</thead>
				<tbody>
				<?php
				if (!empty($records)){
					foreach ($records as $record){
						?>
						<tr>
							<td><?= $record->name; ?></td>
							<td><img src="<?= $record->profile_pic ?>" style="height: 100px;"></td>
							<td><?= $record->email; ?></td>
							<td><?= $record->phone; ?></td>
							<td><?= $record->class; ?></td>
							<td><?= $record->address; ?></td>
							<td>
								<a href="<?= base_url('student/deleteStudent/').$record->id ?>" onclick="return confirm('Do you really want to delete this?')" class="btn btn-danger btn-sm">Delete</a>
								<a href="<?= base_url('student/edit/').$record->id ?>" class="btn btn-warning btn-sm">Update</a>
							</td>
						</tr>
						<?php
					}
				}

				?>
				</tbody>
			</table>
		</div>
	</div>
</main>
