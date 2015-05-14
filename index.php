<?php 

require_once('config.php');

$db = new Database();
$player_list = $db->dbc->players;

$players = new Players();
$players->getAll();

if(!empty($_REQUEST["winner"]) && !empty($_REQUEST["loser"])) {
	$games = new Games();
	
	$games->save_games($_REQUEST["winner"], $_REQUEST["loser"]);
}

$recent = new Games();
$recent->get_recent_games();

require_once('header.php');
?>

    <h1>Magic League Standings</h1>
        <div class="well bs-component">
        <form action="" method="post">
			<fieldset>
            <label for="select" class="col-lg-1 control-label">Winner</label>
			<div class="col-lg-4">
            <select name="winner"  class="form-control">
				<option value=''>Select Player</option>
				<?php foreach($players->players as $id => $full_name) { 
					echo "<option value='$id'>$full_name</option>";
				} ?>
            </select>
			</div>
            <label for="select" class="col-lg-1 control-label">Loser</label>
			<div class="col-lg-4">
            <select name="loser" class="form-control">
				<option value=''>Select Player</option>
            <?php foreach($players->players as $id => $full_name) { 
                echo "<option value='$id'>$full_name</option>";
            } ?>
            </select>
			</div>
            <button type="submit" class="btn btn-primary">Submit</button>
			</fieldset>
        </form>
        </div>
		<h3>Current Standings</h3>
        <div id="standings">
        <table border="1" class="table">
            <tr>
            <th>Player</th>
            <th>Points</th>
            <th colspan="4">Week 1</th>
            <th colspan="4">Week 2</th>
            <th colspan="4">Week 3</th>
            <th colspan="4">Week 4</th>
			<th colspan="4">Week 5</th>
            <th>Points</th>
            </tr>
		<?php foreach($players->players as $id => $full_name) { ?>
            <tr>
				<td><?php echo $full_name ?></td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>9</td>
				<td>9</td>
				<td>9</td>
				<td>9</td>
				<td>9</td>
				<td>9</td>
				<td>9</td>
				<td>9</td>
			</tr>
		<?php } ?>
        </table>
        </div>
		<h3>Recent Games</h3>
		<div id="recent">
			<table border="1" class="table">
				<tr>
					<th>Win</th><th>Loss</th><th>Date</th>
				</tr>
				<pre><?php var_dump($recent->recent); ?></pre>
				<?php foreach($recent->recent as $games) { ?>
				<tr>
					<td><?php echo $players->get_player($games['winner']); ?></td>
					<td><?php echo $players->get_player($games['loser']); ?></td>
					<td><?php echo $games['time']; ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
<?php require_once('footer.php'); ?>