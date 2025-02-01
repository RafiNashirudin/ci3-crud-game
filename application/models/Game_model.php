<?php
class Game_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_all_games() {
        return $this->db->get('game')->result_array();
    }

    public function get_game_by_id($id) {
        return $this->db->get_where('game', ['id' => $id])->row_array();
    }

    public function insert_game($data) {
        return $this->db->insert('game', $data);
    }

    public function update_game($id, $data) {
        return $this->db->update('game', $data, ['id' => $id]);
    }

    public function delete_game($id) {
        return $this->db->delete('game', ['id' => $id]);
    }
}

