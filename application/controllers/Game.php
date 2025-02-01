<?php
class Game extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Game_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
    }

    public function index() {
        $data['games'] = $this->Game_model->get_all_games();
        $this->load->view('game/index', $data);
    }

    public function create() {
        $this->form_validation->set_rules('JudulGame', 'Judul Game', 'required');
        $this->form_validation->set_rules('NegaraAsal', 'Negara Asal', 'required');
        $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('game/create');
        } else {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 1024;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('Gambar')) {
                $data = $this->upload->data();
                $gambar = $data['file_name'];
            } else {
                $gambar = '';
            }

            $game_data = [
                'JudulGame' => $this->input->post('JudulGame'),
                'NegaraAsal' => $this->input->post('NegaraAsal'),
                'Deskripsi' => $this->input->post('Deskripsi'),
                'Gambar' => $gambar
            ];

            $this->Game_model->insert_game($game_data);
            redirect('game');
        }
    }

    public function edit($id) {
        $data['game'] = $this->Game_model->get_game_by_id($id);

        if (!$data['game']) {
            show_404();
        }

        $this->form_validation->set_rules('JudulGame', 'Judul Game', 'required');
        $this->form_validation->set_rules('NegaraAsal', 'Negara Asal', 'required');
        $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('game/edit', $data);
        } else {
            $game_data = [
                'JudulGame' => $this->input->post('JudulGame'),
                'NegaraAsal' => $this->input->post('NegaraAsal'),
                'Deskripsi' => $this->input->post('Deskripsi')
            ];

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 1024;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('Gambar')) {
                $data = $this->upload->data();
                $game_data['Gambar'] = $data['file_name'];
            }

            $this->Game_model->update_game($id, $game_data);
            redirect('game');
        }
    }

    public function delete($id) {
        $this->Game_model->delete_game($id);
        redirect('game');
    }
}

