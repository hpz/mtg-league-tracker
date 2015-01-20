<?php 

require_once('config.php');

$db = new Database();
$player_list = $db->dbc->players;

$players = new Players();
$players->getAll();

?>
<!DOCTYPE html>
<html>
    <head>
    <title>Magic League</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    </head>
    <body>
		<div class="container">
    <h1>Magic League Standings</h1>
        <div class="report">
        <form action="" method="post">
            <label>Winner</label>
            <select name="winner">
            <?php foreach($players->players as $id => $full_name) { 
                echo "<option value='$id'>$full_name</option>";
            } ?>
            </select>
            <br />
            <label>Loser</label>
            <select name="loser">
            <?php foreach($players->players as $id => $full_name) { 
                echo "<option value='$id'>$full_name</option>";
            } ?>
            </select>
            <br />
            <input type="submit">
        </form>
        </div>
        <div id="standings">
        <table border="1" class="table">
            <tr>
            <th>Player</th>
            <th>Points</th>
            <th colspan="4">Week 1</th>
            <th colspan="4">Week 2</th>
            <th colspan="4">Week 3</th>
            <th colspan="4">Week 4</th>
            <th>Points</th>
            </tr>
            <tr>
            <td>Dummy Player 1</td>
            <td>32</td>
            <td>3</td>
            <td>1</td>
            <td>3</td>
            <td>1</td>
            <td>3</td>
            <td>1</td>
            <td>3</td>
            <td>1</td>
            <td>3</td>
            <td>1</td>
            <td>3</td>
            <td>1</td>
            <td>3</td>
            <td>1</td>
            <td>3</td>
            <td>1</td>
            <td>32</td>
            </tr>
            <tr>
            <td>Dummy Player 2</td>
            <td>32</td>
            <td>1</td>
            <td>3</td>
            <td>1</td>
            <td>3</td>
            <td>1</td>
            <td>3</td>
            <td>1</td>
            <td>3</td>
            <td>1</td>
            <td>3</td>
            <td>1</td>
            <td>3</td>
            <td>1</td>
            <td>3</td>
            <td>1</td>
            <td>3</td>
            <td>32</td>
            </tr>
        </table>
        </div>
			</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>