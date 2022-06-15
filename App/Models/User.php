<?php 
namespace App\Models;

use Core\Model;

class User extends Model {

	public function insert (array $row) {
		$this->putOne($row);
	}

	public function getById ($id) {
		// return $this->findOne($id);
	}

	public function getAll () {
		return $this->findAll();
	}
}
?>