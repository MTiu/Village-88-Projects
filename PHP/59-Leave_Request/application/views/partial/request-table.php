        <table>
			<thead>
				<tr>
					<th>Employee Name</th>
					<th>Requests Date</th>
					<th>From Date</th>
					<th>To Date</th>
					<th>Leave Type</th>
				</tr>
			</thead>
			<tbody>
<?php foreach($data as $request) {?>
				<tr>
					<td><?= $request['first_name'] ?> <?= $request['last_name'] ?></td>
					<td><?= $request['request_date'] ?></td>
					<td><?= $request['from_date'] ?></td>
					<td><?= $request['to_date'] ?></td>
					<td><?= $request['leave_type'] ?></td>
				</tr>
<?php } ?>
			</tbody>
		</table>


		