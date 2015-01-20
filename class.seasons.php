<?php

class Seasons {
 
    public $start_date;
    public $end_date;
    
    public $season_id;
    public $db;
    
    public function __construct() {
        
        $this->db = new Database();
    }
    
    public function getSeason($date) {
        $this->season_id = $this->db->dbc->seasons()->where("start_date > ? AND end_date < ?", $date, $date);
    }
}
?>