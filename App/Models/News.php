<?php 
namespace App\Models;

use Core\Model\Model;
use Core\Model\Traits\Sort;

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