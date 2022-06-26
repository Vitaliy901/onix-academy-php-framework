			<?php foreach ($news as $row): ?>
				<article>
					<img srcset="<?= $row->imgSmall ?> 2x">
					<time><?= $row->created_at ?></time>
					<h3>
						<a href="/news/<?= $row->id ?>">
							<?= $row->header ?>
						</a>
					</h3>
					<p>
						<?= $row->abridgement ?>
					</p>
				</article>
			<?php endforeach ?>