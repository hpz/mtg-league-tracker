<?php
require_once('config.php');

$seasons = new Seasons();

require_once('header.php');
?>
	<h1>Seasons</h1>
<?php var_dump($seasons); ?>
	<p><?php var_dump($seasons->season_id); ?></p>
	<p><?php var_dump($seasons->start_date); ?></p>
	<p><?php var_dump($seasons->end_date); ?></p>
<?php require_once('footer.php'); ?>