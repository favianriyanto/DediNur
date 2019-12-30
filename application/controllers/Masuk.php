<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('masuk_model'));
	}
	public function index(){

		$user = $this->masuk_model->get();
		$this->checkRole();
		$data['userdata'] = $user;
		$data['navbar']='navbar';
		$data['content']='masuk';
		$data['slide']=null;
		$data['sidebar']='sidebar';
		$this->load->view('tampilan_masuk',$data);
	}
	public function check(){
		$this->layout = false;
		$login_success = false;
		$username = $_POST['username'];
		$password = $_POST['password'];
		if (isset($username) && isset($password)) {
			if ($this->masuk_model->create($username, $password)) {
				$login_success = true;
			}
		}
		if($username == '' && $password == ''){
			$this->session->set_flashdata('info','<span class="label-input100" style="font-weight:normal; color:#c80000; font-size:15px;">Nama pengguna & kata sandi tidak boleh kosong</span>');
			redirect('masuk');
		}
		if($password == ''){
			$this->session->set_flashdata('info','<span class="label-input100" style="font-weight:normal; color:#c80000; font-size:15px;">Kata sandi tidak boleh kosong</span>');
			redirect('masuk');
		}
		if(!$login_success){
			$this->session->set_flashdata('info','<span class="label-input100" style="font-weight:normal; color:#c80000; font-size:15px;">Nama pengguna atau kata sandi salah</span>');
			redirect('masuk');
		}else{
			$user = $this->masuk_model->get();
			if($user['role'] == 1){
				redirect('admin');
			}else if($user['role'] == 2){
				redirect('admin');
			}else{
				redirect('masuk');
			}
		}
		echo json_encode($response);
	}
	function checkRole(){
		$user = $this->masuk_model->get();
		if(isset($user)){
			if($user['role'] == 1){
				redirect('admin');
			}
		}	
	}
	function logout() {
		$this->masuk_model->clear();
		redirect('masuk');
	}

}
