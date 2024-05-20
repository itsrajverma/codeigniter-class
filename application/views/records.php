
<main>
	<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
		<table class="table table-responsive">
			<thead>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Class</th>
			</thead>
			<tbody>
			<?php
			if (!empty($records)){
				foreach ($records as $record){
					?>
					<tr>
						<td><?= $record->name; ?></td>
						<td><?= $record->email; ?></td>
						<td><?= $record->phone; ?></td>
						<td><?= $record->class; ?></td>
					</tr>
					<?php
				}
			}

			?>
			</tbody>
		</table>
	</div>
</main>
