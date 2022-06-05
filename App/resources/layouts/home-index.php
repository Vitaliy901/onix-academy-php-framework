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
		<link rel="preload" as="style" href="<?= $root ?>css/social-font.css">
		<link rel="preload" as="style" href="<?= $root ?>css/reset.css">
		<link rel="preload" as="style" href="<?= $root ?>css/style.css">
		<link href="https://fonts.googleapis.com/css2?family=League+Spartan&family=Lora&family=Roboto&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?= $root ?>css/social-font.css">
		<link rel="stylesheet" type="text/css" href="<?= $root ?>css/reset.css">
		<link rel="stylesheet" type="text/css" href="<?= $root ?>css/style.css">
		<title><?= $title ?></title>
		<link rel="shortcut icon" href="<?= $root ?>img/favicon/favicon.ico">
	</head>
	<body class="home">

	<header class="home-header">
		<div class="header header_home">
			<div class="header__inner-wrapper header__inner-wrapper_padding">
				<div class="logo logo_font logo_padding-top logo_line">
					<a href="/">RUNO</a>
				</div>
				<div>
					<a class="header-link header__header-link" href="/">Home</a>
					<a class="header-link header__header-link" href="article-list.html">Articles</a>
				</div>
			</div>
		</div>
		<div class="content-wrapper">
			<h1>Richird Norton photorealistic rendering as real photos</h1>
			<div class="slider-wrapper">
				<input type="radio" class="one" id="one" name="radio" checked>
				<label for="one"></label>
				<input type="radio" class="two" id="two" name="radio">
				<label for="two"></label>
				<input type="radio" class="three" id="three" name="radio">
				<label for="three"></label>
				<div class="slide first"></div>
				<div class="slide second"></div>
				<div class="slide third"></div>
			</div>
		</div>
	</header>

	<main class="home-main">
		<div class="home-main__wrapper">
			<div class="home-main-header">
				<h2>News</h2>
				<a href="#">View All</a>
			</div>
			<?= $viewContent?>
		</div>
		<div class="home-main-footer">
			<h2>Richird Norton photorealistic rendering as real photos</h2>
			<p>
				Progressively incentivize cooperative systems through 
				technically sound functionalities. The credibly productivate seamless data.
			</p>
		</div>
	</main>

	<footer class="home-footer">
		<div class="home-footer__wrapper">
			<div>
				<h3>Contact the Publisher</h3>
				<address>
					<a href="#">mike@runo.com</a>
					<p>+944 450 904 505</p>
				</address>
			</div>
			<div>
				<h3>Explorate</h3>
				<ul>
					<li><a href="#">About</a></li>
					<li><a href="#">Partners</a></li>
					<li><a href="#">Job Opportunities</a></li>
					<li><a href="#">Advertise</a></li>
					<li><a href="#">Membership</a></li>
				</ul>
			</div>
			<div class="headquarter">
				<h3>Headquarter</h3>
				<address>
					<span> 
						191 Middleville Road,
						NY 1001, Sydney
						Australia
					</span>
				</address>
			</div>
			<div class="home-footer-social">
				<h3>Connections</h3>
				<ul>
					<li><a class="icon-facebook" href="https://www.facebook.com" title="facebook"></a></li>
					<li><a class="icon-twitter" href="https://twitter.com" title="twitter"></a></li>
					<li><a class="icon-youtube" href="https://www.youtube.com" title="youtube"></a></li>
					<li><a class="icon-pinterest" href="https://www.pinterest.ru" title="pinteres"></a></li>
					<li><a class="icon-behance" href="https://www.behance.net/" title="behance"></a></li>
				</ul>
			</div>
		</div>
		<div class="home-footer__cc-wrapper">
			<span>&copy; 2021 | RUNO Publisher Studio</span>
		</div>
	</footer>

	<script src="/App/resources/js/main.js"></script>
	</body>
</html>