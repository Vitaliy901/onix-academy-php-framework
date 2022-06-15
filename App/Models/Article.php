<?php 
namespace App\Models;

use Core\Model;
use Core\Traits\Sort;

class Article extends Model {
	use Sort;
	public function insert (array $row) {
		$this->putOne($row);
	}
	public function getAll () {
		return $this->findAll();
	}
	public function delete ($id) {
		$this->delOne($id);
	}
}
?>