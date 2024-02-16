<?php if(!empty($validation)){ echo $validation; }?>
<?php foreach($data as $item){?>
				<tr>
					<td><?= $item['name']?></td>
					<td><?= $item['quantity']?></td>
					<td>$<?= $item['price']?></td>
					<td><?= $item['created_at']?></td>
				</tr>
<?php } ?>