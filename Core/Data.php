<?php 
namespace Core;

class Data {
	private static array $decoded = [];

	public static function save (string $path, array $row) {
		$json = file_get_contents($path);

		if (!empty($json)) {
			self::$decoded = self::decode($json);
		}

		self::autoIncrement($row);
		$encoded = self::encode(self::$decoded);
		file_put_contents($path, $encoded);
	}

	public static function get (string $path, ?string $id = null): array|object {
		if (empty($id)) {
			return self::all($path);
		}

		$json = file_get_contents($path);
		if (!empty($json)){
			self::$decoded = self::decode($json);
			foreach (self::$decoded as $row) {
				if ($row->id == $id) {
					return $row;
				}
			}
		}
		return [];
	}

	public static function delete (string $path, $id) {
		$json = file_get_contents($path);
		self::$decoded = self::decode($json);
		foreach (self::$decoded as $index => $row) {
			if ($row->id == $id) {
				unset(self::$decoded[$index]);
				unlink($_SERVER['DOCUMENT_ROOT'] . $row->img);
				$encoded = self::encode(self::$decoded);
				file_put_contents($path, $encoded);
				break;
			}
		}
	}

	private static function decode (string $table): array {
			return json_decode($table);
	}

	private static function encode(array $data): string {
		return json_encode($data);
	}

	private static function autoIncrement (array $row): void {
		if (empty(self::$decoded)) {
			$row['id'] = 1;
			array_push(self::$decoded, $row);
		} else {
			$indexes = array_column(self::$decoded, 'id');
			$row['id'] = max($indexes) + 1;
			array_push(self::$decoded, $row);
		}
	}

	private static function all (string $path): array {
		$json = file_get_contents($path);
		if (!empty($json)){
			return self::decode($json);
		}
		return [];
	}
}
?>