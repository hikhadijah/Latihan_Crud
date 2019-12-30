<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModelLogin");
        $this->load->database();
        $this->load->library('form_validation');
    }

	public function index(){
		$data ['title'] = "Login";
		$this->load->view('headadm',$data);
		$this->load->view('login/login_view');
		$this->load->view('footadm');
    }

    public function aksi_login()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $where = array(
                    'username' => $username,
                    'password' => $password);

        $cek = $this->ModelLogin->cek_login("login", $where)->num_rows();
        if($cek > 0) {
            $data_session = array(
                'nama' => $username,
                'status' => "login"
            );

            $this->session->set_userdata($data_session);
            redirect('myadmin');
        } else {
            $this->session->sess_destroy();
            redirect('login');
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    // registrasi
    public function registrasi()
    {
        $data ['title'] = "Registrasi";
        $this->load->view('headadm',$data);
        $this->load->view('login/registrasi_view');
        $this->load->view('footadm');
    }

    public function aksi_register()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $type = $this->input->post("options");

        $data = array(
            'username' => $username,
            'password' => $password,
            'type' => $type
        );
        $this->ModelLogin->tambah_data($data,"login");
        redirect('login');   
    }
}