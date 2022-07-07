<?php
 if ($session ?? false): ?>
 
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'>
		<meta name="description" content="Article list"> 
		<meta name="keywords" content="Articles">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="preload" href="https://fonts.googleapis.com/css2?family=League+Spartan&family=Lora&family=Roboto&display=swap" as="style">
		<link rel="preload" as="style" href="/css/style.css">
		<link href="https://fonts.googleapis.com/css2?family=League+Spartan&family=Lora&family=Roboto&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		<title><?= $title ?? 'Runo' ?></title>
		<link rel="shortcut icon" href="/img/favicon/favicon.ico">
	</head>
	<body>

		<header class="article-header">
			<div class="article-header__inner-wrapper">
			<svg class="icon_sun" viewBox="0 0 500 500">
					<g id="sun">
						<circle class="st8" cx="249.83" cy="255.63" r="142.54"/>
						<g>
							<g class="ray1">
								<path class="st8" d="M252.32,29.09l32.12,55.63c1.11,1.92-0.28,4.31-2.49,4.31l-64.23,0c-2.21,0-3.6-2.39-2.49-4.31l32.12-55.63    C248.45,27.17,251.21,27.17,252.32,29.09z"/>
							</g>
							<g class="ray2">
									<path class="st8" d="M399.68,86.23l-13.32,62.83c-0.46,2.16-3.09,3.02-4.73,1.54l-47.76-42.95c-1.64-1.48-1.07-4.18,1.03-4.87    l61.08-19.88C398.08,82.21,400.14,84.06,399.68,86.23z"/>
							</g>
							<g class="ray3">
								<path class="st8" d="M474.27,222.89l-50.62,39.54c-1.74,1.36-4.31,0.33-4.62-1.87l-8.93-63.61c-0.31-2.19,1.87-3.89,3.92-3.06    l59.55,24.07C475.62,218.79,476.01,221.52,474.27,222.89z"/>
							</g>
							<g class="ray4">
								<path class="st8" d="M439.63,378.98l-64.12-3.7c-2.21-0.13-3.45-2.6-2.24-4.45l35.27-53.68c1.21-1.85,3.98-1.69,4.97,0.29    l28.86,57.38C443.36,376.79,441.84,379.11,439.63,378.98z"/>
							</g>
							<g class="ray5">
								<path class="st8" d="M330.43,466.26l-50.03-40.29c-1.72-1.39-1.3-4.12,0.77-4.92l59.9-23.18c2.06-0.8,4.22,0.94,3.88,3.12    l-9.87,63.47C334.73,466.65,332.15,467.65,330.43,466.26z"/>
							</g>
							<g class="ray6">
								<path class="st8" d="M98.13,87.32l13.32,62.83c0.46,2.16,3.09,3.02,4.73,1.54l47.76-42.95c1.64-1.48,1.07-4.18-1.03-4.87    l-61.08-19.88C99.73,83.31,97.67,85.16,98.13,87.32z"/>
							</g>
							<g class="ray7">
								<path class="st8" d="M25.7,223.42l50.03,40.29c1.72,1.39,4.3,0.39,4.64-1.8l9.87-63.47c0.34-2.19-1.81-3.92-3.88-3.12l-59.9,23.18    C24.41,219.3,23.98,222.03,25.7,223.42z"/>
							</g>
							<g class="ray8">
								<path class="st8" d="M58.45,375.79l64.17-2.81c2.21-0.1,3.49-2.55,2.3-4.42L90.4,314.39c-1.19-1.87-3.95-1.74-4.97,0.22    l-29.65,56.98C54.75,373.55,56.23,375.88,58.45,375.79z"/>
							</g>
							<g class="ray9">
								<path class="st8" d="M179.88,469.99l-13.32-62.83c-0.46-2.16,1.6-4.01,3.7-3.33l61.08,19.88c2.1,0.68,2.68,3.39,1.03,4.87    l-47.76,42.95C182.97,473.01,180.34,472.16,179.88,469.99z"/>
							</g>
						</g>
					</g>
				</svg>
				<div class="logo-wrapper logo-wrapper--article">
					<a href="/">RUNO</a>
				</div>
				<nav class="header-links">
					<ul>
						<li><a href="/admin">Articles</a></li>
						<li><a href="/logout">Logout</a></li>
					</ul>
				</nav>
			</div>
		</header>

		<main class="article-list">
			<div class="article-list__inner-wrapper">
				<div class="home-link-wrapper">
					<a href="/">Home</a>
				</div>
				<h2>Article List</h2>
				<div class="search-add">
					<form action="" method="GET">
						<input class="search" 
						type="search" 
						name="search" 
						placeholder="Search Articles" 
						autocomplete="on"
						value="<?= $search ?>"
						required>
						<span class="icon-search-glass"></span>
					</form>
					<a class="button-add" href="#open-modal">+ Add New Article</a>
				</div>

				<div class="add-form-modal" id="open-modal">
					<form action="/add" method="POST" enctype="multipart/form-data">
						<fieldset>
							<a href="#" title="Close" class="close">×</a>
							<legend>New Article</legend>
							<label for="header">Header</label>
							<input class="input"
								id="header"
								type="text"
								name="header"
								minlength="5" autofocus required autocomplete="off">
							<label for="content">Content</label>
							<textarea id="content" name="content" cols="10" minlength="140" required></textarea>
							<label for="author">Author</label>
							<input class="input" id="author" name="author" type="text" minlength="3" required>
							<div class="buttons-wr">
								<label class="button-file" for="file">add image</label>
								<input class="file" id="file" name="uploadedFile" type="file" required accept="image/*">
								<input class="button" type="submit" value="Publish">
							</div>
						</fieldset>
					</form>
				</div>

				<div class="table-wrapper">
					<table class="table">
						<thead>
							<tr>
								<th><input type="checkbox"></th>
								<th class="table-image">image</th>
								<th class="table-title">title</th>
								<th class="table-author">author</th>
								<th class="table-last-modified">last modified</th>
								<th class="table-status">status</th>
								<th class="table-action">actions</th>
							</tr>
						</thead>
						<tbody>

							<?= $content ?>
							
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<script src="/js/article-list.js"></script>
	</body>
</html>
<?php else: ?>
	<h2>You are not authentication!</h2>
<?php endif ?>