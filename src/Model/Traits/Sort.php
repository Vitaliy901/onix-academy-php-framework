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

	public function random (int $quantity): array {
		$result = $this->db->get();
		return array_intersect_key($result,array_flip(array_rand($result, $quantity)));
	}
}
?>