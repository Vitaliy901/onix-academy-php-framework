<?php 
namespace App\Controllers;

use Core\Controller;
use Core\Request;
use App\Models\User;

class LoginController extends Controller {

	public function show () {
		$this->layout = 'form/login';
		$this->title = 'Log in';

		return $this->render('form/login-content', [
			'token' => (new Request)->input('token'),
		]);
	}

	public function result () {
		$this->layout = 'form/login';
		$this->title = 'Log in';
		$request = new Request;
		$users = (new User('users'))->getAll();
		session_start();

		if (!empty($_COOKIE['TOKENSESSID'])) {
			foreach ($users as $row) {
				if ($_COOKIE['TOKENSESSID'] == $row->tokenRemember) {
					$_SESSION['auth'] = true;

					header('location: /admin');
				}
			}
		}

		foreach ($users as $row) {
			if ($row->email == $request->input('email') && 
			password_verify($request->input('password'), $row->pass ) &&
			$_SESSION['token'] == $request->input('token')) 
			{
				$_SESSION['auth'] = true;

				if ($request->input('remember') == 'on') {
					setcookie('TOKENSESSID', $row->tokenRemember, time() + 60, '/', '', false, 'httponly');
				}
				header('location: /admin');
			}
		}

		return $this->render('form/login-content', [
			'verify' => 'Invalid login or password',
		]);
	}

	public function out () {
		$this->layout = 'form/login';
		$this->title = 'Log in';
		session_start();
		if ($_SESSION['auth'] == true) {
			$_SESSION['auth'] = false;
			unset($_COOKIE['TOKENSESSID']);
			setcookie('TOKENSESSID', '', time()-1);
		}
		header('location: /login');
	}
}
?>
