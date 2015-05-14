<?php
require_once('config.php');

$players = new Players();
$players->getAll();
?>
<?php require_once('header.php'); ?>
    <h1>Magic League Admin - Players</h1>
<?php if (isset($_GET['action']) && $_GET['action'] === 'addnew') { ?>
    <form action="players.php" method="post">
        <input type="hidden" name="save" value="true">
        <label>Name</label>
    <input type="text" name="name" />
        <br />
        <label>Add to season:</label>
        <select name="season">
        <option value="current">Current Season</option>
        <option value="none">None</option>
        </select>
        <br />
    <input type="submit" value="Add Player">
    </form>
    
<?php } else { 
    if(isset($_POST['save']) && $_POST['save'] === 'true') {
		var_dump($_POST);
        $player_name = isset($_POST['name']) ? $_POST['name'] : '';
        $seasons = new Seasons();
        $season = isset($_POST['season']) ? $_POST['season'] : '';
        switch($season) {
            case "current":
                $season_id = $seasons->currentSeason();
                break;
            case "none":
                $season_id = '';
                break;
            default:
                $season_id = $seasons->getSeason($season);
            
        }
        
        $players->savePlayer($player_name, $season_id);
		$players->getAll();
    }?>
    <form action="" method="post" style="display: inline; margin-right: 10px;">
        <select name="season">
            <option value="all">All Players</option>
            <option value=""></option>
        </select>
    </form>
    <a href="?action=addnew" style="display: inline;">Add Player</a>
    <ul>
    <?php foreach($players->players as $id => $full_name) { 
        echo "<li><a href='?player=$id'>$full_name</a></li>";
    } ?>
    </ul>
<?php } ?>
<?php require_once('footer.php'); ?>