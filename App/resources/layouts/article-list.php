<?php 
	session_start();
?>
<?php if ($_SESSION['auth']): ?>
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
		<link rel="preload" as="style" href="<?= $root ?>css/style.css">
		<link href="https://fonts.googleapis.com/css2?family=League+Spartan&family=Lora&family=Roboto&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?= $root ?>css/style.css">
		<title><?= $title ?></title>
		<link rel="shortcut icon" href="<?= $root ?>img/favicon/favicon.ico">
	</head>
	<body>

		<header class="article-header">
			<div class="article-header__inner-wrapper">
				<div class="logo-wrapper logo-wrapper--article">
					<a href="/">RUNO</a>
				</div>
				<nav class="header-links">
					<ul>
						<li><a href="/news">Articles</a></li>
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
					<form action="#" method="POST">
						<input class="search" type="search" placeholder="Search Articles" autocomplete="on">
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
							<textarea id="content" name="content" cols="10"  minlength="140" required></textarea>
							<label for="author">Author</label>
							<input class="input" id="author" name="author" type="text" minlength="3" required>
							<div class="buttons-wr">
								<label class="button-file" for="file">add image</label>
								<input class="file" id="file" name="uploadedFile" type="file" accept="image/*">
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

							<?= $viewContent ?>
							
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<script src="<?= $root ?>js/article-list.js"></script>
	</body>
</html>
<?php else: ?>
	<h2>You are not authorized!</h2>
<?php endif ?>