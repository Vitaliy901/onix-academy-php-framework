<?php 
namespace App\Models;

use Core\Model\Model;

class User extends Model {

	public function insert (array $row) {
		$this->putOne($row);
	}
	public function getAll () {
		return $this->findAll();
	}
	public function add (object $row) {
		return $this->update($row);
	}
}
?>