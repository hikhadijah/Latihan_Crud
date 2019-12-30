<?php 

class Home extends CI_Controller {
	public function index(){
		$this->load->view('home/view_home');
	}
	public function maintenance(){
		$this->load->view('home/view_maintenance');
	}
}
 ?>