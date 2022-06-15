<?php 
namespace App\Models;

use Core\Model;
use Core\Traits\Sort;

class News extends Model {
	use Sort;

	public function getById (string $id) {
		return $this->findOne($id);
	}

	public function getAll () {
		return $this->findAll();
	}
	
}
?>