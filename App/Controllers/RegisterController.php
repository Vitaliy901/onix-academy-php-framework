<?php 
namespace App\Controllers;

use Core\Controller;
use Core\Request;
use App\Models\User;

class RegisterController extends Controller {

	public function show() {
		$this->layout = 'form/register';
		$this->title = 'Registration';

		return $this->render('form/register-content', [
			'token' => (new Request)->input('token'),
		]);
	}

	public function result () {
		$this->layout = 'form/register';
		$this->title = 'Registration';
		$request = new Request;
		$users = (new User('users'))->getAll();

		foreach ($users as $row) {
			if ($row->email == $request->input('email')) {
				return $this->render('form/register-content', [
					'email_verify' => 'This email is already exists',
				]);
			}
		}

		session_start();
		$_SESSION['auth'] = true;
		if ($_SESSION['token'] == $request->input('token') && 
		$request->input('password') == $request->input('verify')) {

			(new User('users'))->insert([
				'email' => $request->input('email'),
				'pass' => password_hash($request->input('password'), PASSWORD_DEFAULT),
				'created_at' => date('d.m.Y H:i', time()),
			]);
			header('location: /admin');
		}
		return $this->render('form/register-content', [
			'email' => $request->input('email'),
			'verify' => 'Different passwords',
		]);
	}
}

?>