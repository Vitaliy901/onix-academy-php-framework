<?php foreach ($articles as $row): ?>
							<tr>
								<td><input type="checkbox"></td>
								<td><img src="<?= $row->img ?>" alt="blog img"></td>
								<td><?= $row->header ?></td>
								<td><?= $row->author ?></td>
								<td><?= $row->updated_at ?></td>
								<td><?= $row->status ?></td>
								<td>
									<a class="icon-pencil" href="#" title="edit"></a>
									<a class="icon-trash" href="/del/<?= $row->id?>" title="delete"></a>
								</td>
							</tr>
<?php endforeach ?>