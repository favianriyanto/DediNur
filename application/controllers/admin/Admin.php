<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

		$this->load->database();
		$this->load->model(array('masuk_model','transaksi_model'));
		$this->checkRole();
	}
	public function index()
	{
		$user = $this->masuk_model->get();
		$data['userdata'] = $user;
		$data['navbar']='admin/tampilan_navbar';
		$data['content']='admin/tampilan_beranda';
		$data['sidebar']='admin/tampilan_sidebar';
		$data['title']="Beranda";
		$data['scripts'] = array('js/admin/dashboard.js','plugin/form-validation/jquery.validate.min.js','plugin/form-validation/extjquery.validate.min.js','plugin/bootbox/bootbox.js','plugin/datatables-plugins/dataTables.buttons.min.js','plugin/datatables-plugins/buttons.flash.min.js','plugin/datatables-plugins/jszip.min.js','plugin/datatables-plugins/pdfmake.min.js','plugin/datatables-plugins/vfs_fonts.js','js/bootstrap-datepicker.min.js','plugin/datatables-plugins/buttons.html5.min.js','plugin/datatables-plugins/buttons.colVis.min.js','plugin/bootbox/bootbox.js','plugin/datatables-plugins/buttons.print.min.js');
		$this->load->view('admin/tampilan_dasar',$data);
	}
	function checkRole(){
		$user = $this->masuk_model->get();
		if(isset($user)){
			if($user['role'] == 1){
			
			}else{
				redirect('masuk');
			}
		}else{
			redirect('masuk');
		}
	}
}
