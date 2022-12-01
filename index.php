<?php
include('./includes/config.inc.php');

$keres = $oldalak['/'];
if (isset($_GET['oldal'])) {
	if (
		isset($oldalak[$_GET['oldal']]) &&
		file_exists("./templates/pages/{$oldalak[$_GET['oldal']]['fajl']}.tpl.php")) {
			$keres = $oldalak[$_GET['oldal']];
	}
}
include('./templates/index.tpl.php');
?>
