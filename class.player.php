<?php

class Players{
    
    public $players;
    public $player;
    
    public $first_name;
    public $last_name;
    public $full_name;
    
    private $db;
    
    function __construct() {
        $this->db = new Database();
        
    }
    
    public function get_player($id) {
        $this->player = $this->db->dbc->players[$id];
        $this->first_name = $this->player['first_name'];
        $this->last_name = $this->player['last_name'];
        $this->full_name = $this->first_name . ' ' . $this->last_name;
        
        return $this->full_name;
    }
    public function getAll() {
        
        foreach($this->db->dbc->players() as $player) {
            $this->players[$player['id']] = $player['first_name'] . ' ' . $player['last_name'];            
        }
        
        return $this->players;
            
    }
    public function get_first_name($id) {
        return $this->first_name;
    }
    
    public function get_last_name() {
        return $this->last_name;
    }
    
    public function get_full_name() {
        return $this->full_name;
    }
    
    /* public function get_all_players()
    {
        $players = array();
        $db_query = 'SELECT `id`, `first_name`, `last_name` FROM `players`';
        foreach $db_query as $query_results (
            $players = $query_results;
            )
        return $players;
    } */
}