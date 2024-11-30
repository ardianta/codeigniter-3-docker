<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('user_list', $data);
    }
}
?>
