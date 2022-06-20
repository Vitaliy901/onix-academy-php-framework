<?php 
namespace App\Controllers;

use Core\Controller;
use Core\Session\Request;
use Core\View\Html;
use App\Models\User;
use Core\Session;

class RegisterController extends Controller {

	public function show(): Html {

		return new Html('form/register','form/register-content', 
		[
			'title' => 'Registration',
			'token' => (new Request)->input('token'),
		]);
	}

	public function result (): Html {
		$request = new Request;

		$users = (new User('users'))->getAll();

		foreach ($users as $row) {
			if ($row->email == $request->input('email')) {
				return new Html('form/register','form/register-content',
				[
					'title' => 'Registration',
					'email_verify' => 'This email is already exists',
				]);
			}
		}

/* 		$_SESSION['auth'] = true; */
		if ($_SESSION['token'] == $request->input('token') && 
		$request->input('password') == $request->input('verify')) {

			(new User('users'))->insert([
				'email' => $request->input('email'),
				'pass' => password_hash($request->input('password'), PASSWORD_DEFAULT),
				'tokenRemember' => Session::token(),
				'created_at' => date('d.m.Y H:i', time()),
			]);
			header('location: /admin');
		}
		return new Html('form/register','form/register-content',
		[
			'title' => 'Registration',
			'email' => $request->input('email'),
			'verify' => 'Different passwords',
		]);
	}
}

?>