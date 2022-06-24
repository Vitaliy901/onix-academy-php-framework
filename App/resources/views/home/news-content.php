			<?php foreach ($news as $row): ?>
				<article>
					<img src="<?= $row->img ?>" srcset="<?= $row->img ?> 2x">
					<time><?= $row->created_at ?></time>
					<h3>
						<a href="/news/<?= $row->id ?>">
							<?= $row->header ?>
						</a>
					</h3>
					<p>
						<?= $row->content ?>
					</p>
				</article>
			<?php endforeach ?>