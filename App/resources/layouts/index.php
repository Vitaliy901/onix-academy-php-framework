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
		<link rel="preload" as="style" href="css/style.css">
		<link href="https://fonts.googleapis.com/css2?family=League+Spartan&family=Lora&family=Roboto&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title><?= $title ?? 'Runo' ?></title>
		<link rel="shortcut icon" href="img/favicon/favicon.ico">
	</head>
	<body class="home">

	<header class="home-header">
		<div class="header-wrapper">
			<div class="article-header__inner-wrapper inner-wrapper--padding">
				<div class="logo-wrapper logo-wrapper--article">
					<a class="home-logo" href="/">RUNO</a>
				</div>
				<nav class="header-links">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="/login">Articles</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<div class="content-wr">
			<div class="content-wr__container">
				<h1>Richird Norton photorealistic rendering as real photos</h1>
			</div>
		</div>
		<div class="slider fade">
			<div>
				<div class="image">
						<div class="img one"></div>
				</div>
			</div>
			<div>
				<div class="image">
					<div class="img two"></div>
				</div>
			</div>
			<div>
				<div class="image">
						<div class="img three"></div>
				</div>
			</div>
		</div>
	</header>

	<main>
		<div class="hm-wrapper">
			<div class="hm-wrapper__hm-header">
				<h2>News</h2>
				<a href="/news">View All</a>
			</div>
			<div class="common-wrapper">

			<?= $content?>
			
			</div>
		</div>
		<div class="hm-wrapper__hm-footer">
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
			<div>
				<h3>Connections</h3>
				<ul class="home-footer-social">
					<li><a class="icon-facebook" href="https://www.facebook.com" title="facebook" target="blank"></a></li>
					<li><a class="icon-twitter" href="https://twitter.com" title="twitter" target="blank"></a></li>
					<li><a class="icon-youtube" href="https://www.youtube.com" title="youtube" target="blank"></a></li>
					<li><a class="icon-pinterest" href="https://www.pinterest.ru" title="pinteres" target="blank"></a></li>
					<li><a class="icon-behance" href="https://www.behance.net/" title="behance" target="blank"></a></li>
				</ul>
			</div>
		</div>
		<div class="home-footer__cc-wrapper">
			<span>&copy; 2021 | RUNO Publisher Studio</span>
		</div>
	</footer>

	<script src="/js/jquery-3.6.0.min.js"></script>
	<script src="/js/slick.min.js"></script>
	<script src="/js/main.js"></script>
	</body>
</html>