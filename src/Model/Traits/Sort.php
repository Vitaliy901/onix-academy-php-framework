<?php 
namespace Core\Model\Traits;
// сортирует статьи по убиванию.
trait Sort {

	public function latest(): array {
		$result = $this->db->get();
		usort($result, function ($a, $b) {
			return $b->created_at <=> $a->created_at ;
		});
		return $result;
	}
}
?>