<?php 
namespace Core\Model\Traits;

// article sorter.

trait Sort {

	public function latest(): array {
		$result = $this->db->get();
		usort($result, function ($a, $b) {
			return $b->created_at <=> $a->created_at ;
		});
		return $result;
	}

	public function random (int $except = null,int $quantity = 3): array {
		$data = $this->db->get();
		if (count($data) > 0 && count($data) < 4) {
			foreach ($data as $key => $row) {
				if ($row->id == $except) {
					unset($data[$key]);
					return $data;
				}
			}
		}
		$result = array_intersect_key($data,array_flip(array_rand($data,$quantity + 1)));
		foreach ($result as $key => $row) {
			if ($row->id == $except) {
				unset($result[$key]);
				return $result;
			}
		}
		unset($result[0]);
		return $result;
	}
}
?>