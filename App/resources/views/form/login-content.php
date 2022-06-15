					<form class="form" action="/login/result" method="POST">
						<fieldset>
							<legend>Login to your account</legend>
							<input type="hidden" name="token" value="<?= $token ?>">
							<label for="email">Email</label>
							<input class="input"
							id="email" 
							type="email" 
							name="email"
							pattern="\S+@[a-z]+\.[a-z]+" 
							autofocus required
							placeholder="<?= $verify ?>"
							>
							<label for="pass">Password</label>
							<input class="input" 
							id="pass" 
							type="password" 
							name="password" 
							minlength="8" required>
							<div class="form__rf-wrapper">
								<label>
									<input type="checkbox" name="remember">
									<span>Remember me</span>
								</label>
								<a class="link" href="#">Forgot password?</a>
							</div>
							<input class="button" type="submit" value="Log in">
							<input class="button button_black" type="button" value="Sign in with Google">
							<div class="links-wrapper">
								<span>
									Don’t have an account?
								</span>
								<a class="link" href="/register">Register</a>
							</div>
						</fieldset>
					</form>