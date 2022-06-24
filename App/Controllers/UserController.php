<?php 
namespace App\Controllers;

use Core\Sessions\Request;
use Core\View\Html;
use App\Models\User;

class UserController {

	public function login () {
		$request = new Request;
		$users = (new User)->findAll()->latest();

		if (!empty($_COOKIE['runo_user'])) {
			foreach ($users as $row) {
				if ($_COOKIE['runo_user'] == $row->tokenRemember) {
					$_SESSION['auth'] = $row->id;

					header('location: /admin');
					die();
				}
			}
		}

		return new Html('form/login','form/login-content', 
		[
			'title' => 'Log in',
			'token' => (new Request)->token(),
			'verify' => '',
		]);
	}
	public function register () {

		return new Html('form/register','form/register-content', 
		[
			'title' => 'Registration',
			'email_verify' => '',
			'email' => '',
			'verify' => '',
			'token' => (new Request)->token(),
		]);
	}

	public function loginResult () {
		$request = new Request;
		$users = (new User)->findAll()->latest();

		foreach ($users as $row) {
			if ($row->email == $request->input('email') && 
			password_verify($request->input('password'), $row->pass ) &&
			$_SESSION['csrf'] == $request->input('token'))
			{
				$_SESSION['auth'] = true;

				if ($request->input('remember') == 'on') {
					setcookie('runo_user', $row->tokenRemember, strtotime('+1 year'), DS, '', false, 'httponly');
				}
				header('location: /admin');
				die();
			}
		}
		return new Html('form/login','form/login-content',
		[
			'title' => 'Log in',
			'token' => $request->token(),
			'verify' => 'Invalid login or password',
		]);
	}

	public function registerResult () {
		$request = new Request;
		$users = (new User)->findAll()->latest();

		foreach ($users as $row) {
			if ($row->email == $request->input('email')) {
				return new Html('form/register','form/register-content',
				[
					'title' => 'Registration',
					'email_verify' => 'This email is already exists',
					'email' => '',
					'verify' => '',
					'token' => (new Request)->token(),
				]);
			}
		}

		if ($_SESSION['csrf'] == $request->input('token') &&
		$request->input('password') == $request->input('verify')) {

			(new User('users'))->insert([
				'email' => $request->input('email'),
				'pass' => password_hash($request->input('password'), PASSWORD_DEFAULT),
				'tokenRemember' => $request->token(),
				'created_at' => date('d.m.Y H:i', time()),
			]);

			$_SESSION['auth'] = true;
			header('location: /admin');
			die();
		}
		return new Html('form/register','form/register-content',
		[
			'title' => 'Registration',
			'email_verify' => '',
			'email' => $request->input('email'),
			'verify' => 'Different passwords',
			'token' => (new Request)->token(),
		]);
	}

	public function out () {
		$users = (new User)->findAll()->latest();
		$request = new Request;

		if (!empty($_SESSION['auth'])) {
			foreach ($users as $row) {
				if ($row->id == $_SESSION['auth']) {
					$row->tokenRemember = $request->token();
					(new User)->add($row);
				}
			}
			$_SESSION['auth'] = false;
			unset($_COOKIE['runo_user']);
			setcookie('runo_user', '', time() - 1);
		}
		header('location: /login');
		die();
	}
}
?>
