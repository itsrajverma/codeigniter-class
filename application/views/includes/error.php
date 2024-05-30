<div class="col-md-12 mt-1 mb-1">
	<?php
	$success = $this->session->flashdata('success');
	$error = $this->session->flashdata('error');
	if (!empty($success)){
		?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Success!</strong> <?= $success ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php
		}
		if (!empty($error)){
			?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Error!</strong> <?= $error ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php
		}
	?>
</div>
