<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'>
		<meta name="description" content="Form for registration"> 
		<meta name="keywords" content="create, account, email">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="preload" href="https://fonts.googleapis.com/css2?family=League+Spartan&family=Lora&family=Roboto&display=swap" as="style">
		<link rel="preload" as="style" href="<?= $root ?>css/style.css">
		<link href="https://fonts.googleapis.com/css2?family=League+Spartan&family=Lora&family=Roboto&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?= $root ?>css/style.css">
		<title><?= $title?></title>
		<link rel="shortcut icon" href="<?= $root ?>img/favicon/favicon.ico">
	</head>
	<body>

		<div class="register">
			<div class="register__left">
				<a class="onix-logo" href="https://onix.kr.ua/"></a>
				<img src="<?= $root ?>img/form_runo_img.jpg"
					srcset="<?= $root ?>img/form_runo_img2x.jpg 2x" 
					alt="Runo img">
			</div>
			<div class="register__right">
				<div class="form-wrapper">
					<div class="logo-wrapper logo-wrapper--padding-top">
						<a href="/">RUNO</a>
					</div>

					<?= $viewContent ?>

				</div>
			</div>
		</div>

	</body>
</html>
