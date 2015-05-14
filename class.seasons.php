<?php

class Seasons {
 
    public $start_date;
    public $end_date;
    
    public $season_id;
    private $db;
    
    public function __construct() {
        
        $this->db = new Database();
		$this->currentSeason();
		
    }
    
    public function getSeason($date) {
        $season = $this->db->dbc->seasons()->where("start_date < ?", $date)->where("end_date > ?", $date)->fetch();
		
		$this->season_id = $season['id'];
		$this->start_date = $season['start_date'];
		$this->end_date = $season['end_date'];
    }
	
	public function currentSeason() {
		$this->getSeason(date("Y-m-d"));
	}
	
	public function saveSeason($start_date, $end_date) {
		
		$db_data = array(
			"start_date" =>$start_date,
			"end_date" => $end_date
		);
		$seasondb = $this->db->dbc->seasons();
		$result = $seasondb->insert($db_data);
		
	}
		
		
}
?>