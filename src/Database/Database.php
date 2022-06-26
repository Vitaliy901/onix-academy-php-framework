<?php 
namespace Core\Database;

use Core\Exceptions\DatabaseException;

class Database {
	private static array $instances = [];
	protected array $data = [];
	private string $path;

	protected function __construct(string $table)
	{
		if (file_exists(DATA_BASE . DS. $table . FILE_FORMAT)) {
			$this->path = DATA_BASE . DS. $table . FILE_FORMAT;
			if (file_get_contents($this->path)) {
				$this->data = json_decode(file_get_contents($this->path));
			} else {
				throw new DatabaseException('Table ' . '<b>' . $table . '</b>' . ' is empty!');
			}
		} else {
			throw new DatabaseException( 'Invalid directory for this: ' . DATA_BASE);
		}
		register_shutdown_function([$this,'save']);
	}

	public static function instance (string $table): self {
		if (empty(self::$instances[static::class])) {
			self::$instances[static::class] = new static($table);
		}
		return self::$instances[static::class];
	}

	public function get (string|int $id = null): array|object {
		if (empty($id)) {
			return $this->data;
		}
		foreach ($this->data as $row) {
			if ($row->id == $id) {
				return $row;
			}
		}
		throw new DatabaseException( 'Query: <b>' . $id . '</b> not found in a table.' , 404);
	}

	public function put (array $row) {
		$this->autoIncrement($row);
	}

	public function update(object $row): void {
		foreach ($this->data as $key => $user) {
			if ($user->id == $row->id) {
				$this->data[$key] = $row;
			}
		}
	}

	public function delete (string|int $id) {
		foreach ($this->data as $index => $row) {
			if ($row->id == $id) {
				unlink(SERVER_ROOT . $row->img);
				unlink(SERVER_ROOT . $row->imgSmall);
				unset($this->data[$index]);
				break;
			}
		}
	}

	protected function save (): void {
		ksort($this->data);
		file_put_contents($this->path, json_encode($this->data));
	}

	private function autoIncrement (array $row): void {
		if (empty($this->data)) {
			$anonym = $this->anonymous($row);
			$anonym->id = 1;
			array_push($this->data, $anonym);
		} else {
			$anonym = $this->anonymous($row);
			$indexes = [];
			foreach ($this->data as $key => $row) {
				$indexes[] = $row->id;
			}
			$anonym->id = max($indexes) + 1;
			array_push($this->data, $anonym);
		}
	}

	// convert array to object
	private function anonymous (array $row): object{
		$anonym = new class {
			public function __set($name, $value)
			{
				$this->$name = $value;
			}
		};
		foreach ($row as $key => $value) {
			$anonym->{$key} = $value;
		}
		return $anonym;
	}
}
?>