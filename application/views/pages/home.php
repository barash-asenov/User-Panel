<div class="text-center">
	<h1>Users</h1>
	<br/>
	<?php if (isset($users) && !empty($users)): ?>
		<table class="table">
			<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Username</th>
				<th scope="col">Email</th>
			</tr>
			</thead>
			<tbody>
			<?php $counter = 1; ?>
			<?php foreach ($users as $user): ?>
				<tr>
					<th scope="row"><?= $counter ?></th>
					<td><?= $user['username'] ?></td>
					<td><?= $user['email'] ?></td>
				</tr>
				<?php $counter++; ?>
			<?php endforeach; ?>
		</table>
	<?php else: ?>
		<div class="alert alert-danger" role="alert">
			No User Found!
		</div>
	<?php endif; ?>
</div>

