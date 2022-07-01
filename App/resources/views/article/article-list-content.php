<?php foreach ($articles as $row): ?>
							<tr>
								<td><input type="checkbox"></td>
								<td><img src="<?= $row->imgSmall ?>" alt="blog img"></td>
								<td><?= $row->header ?></td>
								<td><?= $row->author ?></td>
								<td><?= $row->updated_at ?></td>
								<td><?= $row->status ?></td>
								<?php if ($row->users_id === $_SESSION['id']): ?>
								<td>
									<a class="icon-pencil" href="#" title="edit"></a>
									<a class="icon-trash" href="/del/<?= $row->id?>" title="delete"></a>
								</td>
								<?php else: ?>
								<td>
									<a style="pointer-events: none; opacity: 0.5;" class="icon-pencil" href="#" title="edit"></a>
									<a style="pointer-events: none; opacity: 0.5;" class="icon-trash" href="#" title="delete"></a>
								</td>
								<?php endif ?>
							</tr>
<?php endforeach ?>