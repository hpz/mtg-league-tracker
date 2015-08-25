<?php

class Games {

	public $player_win;
	public $player_loss;
	
	public $headhunter = false;
	
	public $season_id;
	
	private $db;
	private $games;
	public $recent;
	
	function __construct() {
        $this->db = new Database();
		$this->games = $this->db->dbc->games();
        
    }
	
	public function get_recent_games($player_id = '') {
		$recentGames = $this->games
			->limit(10)
		;
		
		foreach($recentGames as $games) {
			$this->recent[$games['id']] = array('time'=>$games['timestamp'], 'winner'=>$games['player_win'], 'loser'=>$games['player_loss']);
		}
		
		return $this->recent;
	}
	
	public function get_games($player_id = '', $start_date = '', $end_date = '', $limit = '100') {
		$recentGames = $this->games
			->where('player_win = ? OR player_loss = ?', $player_id, $player_id)
			->where('timestamp > ?', $start_date . ' 00:00:00')
			->where('timestamp < ?', $end_date . ' 23:59:59')
			->limit($limit)
			->order('timestamp')
		;
		
		foreach($recentGames as $games) {
			$this->recent[$games['id']] = array("time"=>$games['timestamp'], "winner"=>$games['player_win'], "loser"=>$games['player_loss']);
		}
		
		return $this->recent;
	}	
	
	public function save_games($winner, $loser) {
		
		$data = array(
			"timestamp" => date("Y-m-d H:i:s", time()),
			"season_id" => "0",
			"player_win" => $winner,
			"player_loss" => $loser,
			"headhunter" => "0"
		);
		$result = $this->games->insert($data);
		return $result;
	}
	
	public function save_points($player_id, $game_result) {
		$prev_games = new Games();
	}
	
	public function calcWeekPoints($start, $end, $playerID) {
		
	}
		
}