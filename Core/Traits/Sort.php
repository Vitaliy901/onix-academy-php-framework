<?php 
namespace Core\Traits;
// сортирует статии по убиванию.
trait Sort {

	public function latest(array $array): array {
		usort($array, function ($a, $b) {
			return $b->created_at <=> $a->created_at ;
		});
		return $array;
	}
}
?>