		<article class="article-page-mn__article">
			<header class="article-hd">
				<h1><?= $header ?></h1>
				<p>
					Progressively incentivize cooperative systems through technically 
					sound functionalities. The credibly productivate seamless data.
				</p>

				<img srcset="<?= $img ?> 2x" alt="#">
			</header>

			<?= $articleContent ?>

			<time datetime="<?= str_replace('.','-',$created_at)?>">Created <?= $created_at ?></time>
			<hr>
			<footer class="author-ft">
				<img src="/img/author.jpg" srcset="/img/author2x.jpg 2x" alt="author">
				<address>
					<div class="author-name">
						<span>By <?= $author ?></span>
						<span>Thinker & Designer</span>
					</div>
					<ul class="author-wr__social">
						<li><a class="icon-facebook" href="https://www.facebook.com" title="facebook" target="blank"></a></li>
						<li><a class="icon-twitter" href="https://twitter.com" title="twitter" target="blank"></a></li>
						<li><a class="icon-pinterest" href="https://www.pinterest.ru" title="pinteres" target="blank"></a></li>
						<li><a class="icon-behance" href="https://www.behance.net/" title="behance" target="blank"></a></li>
					</ul>
				</address>
			</footer>
		</article>

		<div class="article-page-mn__footer">
			<div class="footer__wr">
				<h2>Related Posts</h2>
				<div class="slider single-item related-wr">
				<?php foreach ($relatedPosts as $row): ?>
					<div>
						<h3>
							<article>
								<img srcset="<?= $row->imgSmall ?> 2x" alt="#">
								<time datetime="<?= str_replace('.','-', $row->created_at)?>">Created <?= $row->created_at ?></time>
								<h3>
									<a href="/news/<?= $row->id ?>">
										<?= $row->header ?>
									</a>
								</h3>
								<p>
									<?= $row->abridgement ?>
								</p>
							</article>
						</h3>
					</div>
				<?php endforeach ?>
				</div>
			</div>
		</div>