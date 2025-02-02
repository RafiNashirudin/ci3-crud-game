<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_games() {
        return $this->db->get('game')->result();
    }

    public function get_game_by_id($id) {
        return $this->db->get_where('game', array('id' => $id))->row();
    }

    public function insert_game($data) {
        $this->db->insert('game', $data);
        return $this->db->insert_id();
    }

    public function update_game($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('game', $data);
    }

    public function delete_game($id) {
        return $this->db->delete('game', array('id' => $id));
    }
}