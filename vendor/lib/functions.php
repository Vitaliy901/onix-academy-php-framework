<?php 

function dump($data) {
	echo '<pre 
	style="font-family: courier new;
	font-weight: 600;
	letter-spacing: 1px;
	color: black;
	background: #c9e0e5;"><code>' . htmlspecialchars(print_r($data, true)) . '</pre></code>';
}

?>