<?php 
namespace App\Controllers;

use Core\Sessions\Request;
use Core\View\Html;
use App\Models\User;

class UserController {

	public function login () {
		$request = new Request;
		$users = (new User)->findAll();

		if (!empty($_COOKIE['runo_user'])) {
			foreach ($users as $row) {
				if ($_COOKIE['runo_user'] == $row->tokenRemember) {
					$request->session()->put('auth', true);
					$request->session()->put('id', $row->id);
					redirect('/admin');
				}
			}
		}

		return new Html('form/login','form/login-content', 
		[
			'title' => 'Log in',
			'token' => $request->token(),
			'verify' => '',
			'session' => $request->session()->get('auth'),
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
		$users = (new User)->findAll();

		foreach ($users as $row) {
			if ($row->email == $request->input('email') && 
			password_verify($request->input('password'), $row->pass ) &&
			$request->session()->get('csrf') == $request->input('token'))
			{
				$request->session()->put('auth', true);
				$request->session()->put('id', $row->id);
				if ($request->input('remember') == 'on') {
					setcookie('runo_user', $row->tokenRemember, strtotime('+1 year'), DS, '', false, 'httponly');
				}
				redirect('/admin');
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
		$users = (new User)->findAll();

		foreach ($users as $row) {
			if ($row->email == $request->input('email')) {
				return new Html('form/register','form/register-content',
				[
					'title' => 'Registration',
					'email_verify' => 'This email is already exists',
					'email' => '',
					'verify' => '',
					'token' => $request->token(),
				]);
			}
		}

		if ($request->session()->get('csrf') == $request->input('token') &&
		$request->input('password') == $request->input('verify')) {

			(new User('users'))->insert([
				'email' => $request->input('email'),
				'pass' => password_hash($request->input('password'), PASSWORD_DEFAULT),
				'tokenRemember' => $request->token(),
				'created_at' => date('d.m.Y H:i', time()),
			]);
			foreach ((new User)->findAll() as $row) {
				if ($row->email == $request->input('email')) {
					$request->session()->put('auth', true);
					$request->session()->put('id', $row->id);
				}
			}
			redirect('/admin');
		}
		
		return new Html('form/register','form/register-content',
		[
			'title' => 'Registration',
			'email_verify' => '',
			'email' => $request->input('email'),
			'verify' => 'Different passwords',
			'token' => $request->token(),
		]);
	}

	public function out () {
		$users = (new User)->findAll();
		$request = new Request;

		if (!empty($request->session()->get('auth'))) {
			foreach ($users as $row) {
				if ($row->id == $request->session()->get('id')) {
					$row->tokenRemember = $request->token();
					(new User)->add($row);
				}
			}
			$request->session()->put('auth', false);
			unset($_COOKIE['runo_user']);
			setcookie('runo_user', '', time() - 1);
		}
		redirect('/login');
	}
}
?>
