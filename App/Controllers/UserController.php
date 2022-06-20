<?php 
namespace App\Controllers;

use Core\Controller;
use Core\Sessions\Request;
use Core\View\Html;
use App\Models\User;

class UserController extends Controller {

	public function login (): Html {
		$request = new Request;
		$users = (new User('users'))->getAll();

		if (!empty($_COOKIE['runo_user'])) {
			foreach ($users as $row) {
				if ($_COOKIE['runo_user'] == $row->tokenRemember) {
					$_SESSION['auth'] = $row->id;

					header('location: /admin');
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
	public function register (): Html {

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
		$users = (new User('users'))->getAll();

		foreach ($users as $row) {
			if ($row->email == $request->input('email') && 
			password_verify($request->input('password'), $row->pass ) &&
			$_SESSION['csrf'] == $request->input('token'))
			{
				$_SESSION['auth'] = $row->id;

				if ($request->input('remember') == 'on') {
					setcookie('runo_user', $row->tokenRemember, strtotime('+1 year'), DS, '', false, 'httponly');
				}
				header('location: /admin');
			}
		}
		return new Html('form/login','form/login-content',
		[
			'title' => 'Log in',
			'token' => $request->token(),
			'verify' => 'Invalid login or password',
		]);
	}

	public function registerResult (): Html {
		$request = new Request;
		$users = (new User('users'))->getAll();

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
		$users = (new User('users'))->getAll();
		$request = new Request;

		if (!empty($_SESSION['auth'])) {
			foreach ($users as $row) {
				if ($row->id == $_SESSION['auth']) {
					$row->tokenRemember = $request->token();
					(new User('users'))->add($row);
				}
			}
			$_SESSION['auth'] = false;
			unset($_COOKIE['runo_user']);
			setcookie('runo_user', '', time() - 1);
		}
		header('location: /login');
	}
}
?>