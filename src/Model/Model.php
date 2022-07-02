<?php 
namespace Core\Model;

use Core\Model\Traits\Sort;

abstract class Model {
	use Sort;

	private object $db; // Instance of table from database;
	protected string $table; // Name of table from database.

	public function __construct() // Creates a singleton table class and object
	{
		$this->table = ucfirst($this->table);
		file_put_contents(ROOT . DS . 'src' . DS . 'Database' . DS . 'Tables' . DS . $this->table . '.php', 
		"<?php\nnamespace Core\Database\Tables;\n\nuse Core\Database\Database;\n\nclass {$this->table} extends Database {}\n?>");
		$table = 'Core\Database\Tables\\' . $this->table;
		$this->db = $table::instance(lcfirst($this->table));
	}

	public function insert (array $row): void {
		$this->db->put($row);
	}

	public function findAll (string $sort = null): array|object {
		return match ($sort) {
			null => $this->db->get(),
			'sort' => $this,
			default => throw new \Exception("Invalid parameter in the method <b>findAll</b>. Should be 'sort'."),
		};
	}

	public function findOne (string|int $id): object{
		return $this->db->get($id);
	}

	public function add (object $row): void{
		$this->db->update($row);
	}

	public function delOne (string|int $id ): void{
		$this->db->delete($id);
	}

	public function search (string $querySearch): array {
		$query = strtolower($querySearch);
		$data = $this->db->get();
		$found = [];

		foreach ($data as $row) {
			if (str_contains(strtolower($row->header), trim($query)) ||
				str_contains(strtolower($row->header), trim($query)) ||
				str_contains(strtolower($row->author), trim($query)) ||
				str_contains(strtolower($row->created_at), trim($query))) {
				$found[] = $row;
			}
		}
		return $found;
	}
}
?>