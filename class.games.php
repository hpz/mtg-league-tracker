<?php

class Games {

	public $player_win;
	public $player_loss;
	
	public $headhunter = false;
	
	public $season_id;
	
	private $db;
	private $games;
	
	function __construct() {
        $this->db = new Database();
		$this->games = $this->db->dbc->games();
        
    }
	
	public function get_games($player_id = '') {
	
	}
	
	public function save_games($winner, $loser) {
		$data = array(
			"timestamp" => time(),
			"season_id" => "0",
			"player_win" => $winner,
			"player_loss" => $loser,
			"headhunter" => "0"
		);
		$result = $this->games->insert($data);
		return $result;
	}
}