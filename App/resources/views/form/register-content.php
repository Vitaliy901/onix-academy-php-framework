					<form class="form" action="/register/result" method="POST">
						<fieldset>
							<legend>Create account</legend>
							<input type="hidden" name="token" value="<?= $token ?>">
							<label for="email">Email</label>
							<input class="input"
							id="email" 
							type="email" 
							name="email"
							pattern="\w+@[a-z]+\.[a-z]+"
							autofocus required
							placeholder="<?= $email_verify ?>"
							value="<?= $email ?>">
							<label for="pass">Password</label>
							<input class="input" 
							id="pass" 
							type="password" 
							name="password" 
							minlength="6" required>
							<label class="label" for="pass">Confirm Password</label>
							<input class="input"
							id="confirm"
							type="password"
							name="verify"
							minlength="6" required
							placeholder="<?= $verify ?>"
							>
							<input class="button" type="submit" value="Create account">
							<input class="button button_black" type="button" value="Sign up with Google">
							<div class="links-wrapper">
								<span>
									Already have an account?
								</span>
								<a class="link" href="/login">Log In</a>
							</div>
						</fieldset>
					</form>