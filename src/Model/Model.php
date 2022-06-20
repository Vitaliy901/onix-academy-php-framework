<?php 
namespace Core\Model;

class Model {
	private string $db_path;
	protected string $table; // Имя таблицы из БД.

	public function __construct(string $name)
	{
		$this->table = $name;

		if (file_exists(DATA_BASE)) {
			$this->db_path = DATA_BASE . DS;
		} else {
			echo 'There is no database for this directory - ' . DATA_BASE;
		}

	}

	protected function putOne (array $row): void {
		$connection = $this->connect();
		Data::save($connection, $row);
	}

	protected function findOne (string $id): object|array{
		$connection = $this->connect();
		return Data::get($connection, $id);
	}
	protected function delOne (string $id): void{
		$connection = $this->connect();
		Data::delete($connection, $id);
	}
	protected function update (object $row): void{
		$connection = $this->connect();
		Data::update($connection, $row);
	}
	protected function findAll (): object|array {
		$connection = $this->connect($this->table);
		return Data::get($connection);
	}

	private function connect(): string {
		$path = $this->db_path . $this->table . FILE_FORMAT;
		try {
			if (!file_exists($path)) {
				throw new \Exception('Table is not exists in this ' . DATA_BASE);
			}
		} catch (\Exception $e) {
			echo $e->getMessage(); 
			die();
		}
		return $path;
	}
}
?>