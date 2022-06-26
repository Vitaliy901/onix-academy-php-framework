<?php 
namespace Core;

use GdImage;

class ImageManager {
	private GdImage $img;
	private string $path;
	private GdImage $newImg;

	public function __construct(string $fileName)
	{
		$this->path = $fileName;
		$this->img = imagecreatefromjpeg($fileName);
	}
	public function resize (int $new_width, int $new_height, string $path, int $quality = 100): void {
		list($width, $height) = getimagesize($this->path);
		$this->newImg = imagecreatetruecolor($new_width, $new_height);
		imagecopyresampled($this->newImg, $this->img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		imagejpeg($this->newImg, $path, $quality);
		imagedestroy($this->newImg);
	}
}
?>