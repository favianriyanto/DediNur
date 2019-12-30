<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

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
		$this->load->model(array('transaksi_model','masuk_model','pengguna_model','pasien_model','obat_model'));
	}
	public function obatKeluar(){
		$user = $this->masuk_model->get();
		$data['userdata'] = $user;
		$this->checkRole();
		$data['navbar']='admin/tampilan_navbar';
		$data['content']='admin/tampilan_obatkeluar';
		$data['slide']=null;
		$data['sidebar']='admin/tampilan_sidebar';
		$data['title']='Transaksikeluar';

		$data['pasien'] = $this->pasien_model->get()->result_array();
		$data['transaksi'] = $this->transaksi_model->get(array('tipe'=>1))->result_array();
		$data['kode_transaksi'] = 'OK'.date('Hisdmy');
		$data['pengguna'] = $this->pengguna_model->get(array('user_login_id'=>$user['id']))->row_array();
		$data['pengguna'] = $data['pengguna']['id_pengguna'];

		$data['scripts'] = array('js/admin/transaksi.js','plugin/form-validation/jquery.validate.min.js','plugin/bootbox/bootbox.js','js/bootstrap-datepicker.min.js');
		$this->load->view('admin/tampilan_dasar',$data);
	}
	public function getObat(){
		$obat = $this->obat_model->get()->result_array();
		echo json_encode($obat);
	}
	public function getObatDetails(){
		$id = $_POST['id'];
		$obat = $this->obat_model->get(array('id_obat'=>$id))->row_array();
		echo json_encode($obat);
	}
	public function obatMasuk(){
		$user = $this->masuk_model->get();
		$data['userdata'] = $user;
		$this->checkRole();
		$data['navbar']='admin/tampilan_navbar';
		$data['content']='admin/tampilan_obatmasuk';
		$data['slide']=null;
		$data['sidebar']='admin/tampilan_sidebar';
		$data['title']='Transaksimasuk';

		$data['transaksi'] = $this->transaksi_model->get(array('tipe'=>2))->result_array();
		$data['kode_transaksi'] = 'OM'.date('Hisdmy');
		$data['pengguna'] = $this->pengguna_model->get(array('user_login_id'=>$user['id']))->row_array();
		$data['pengguna'] = $data['pengguna']['id_pengguna'];
		$data['scripts'] = array('js/admin/transaksi.js','plugin/form-validation/jquery.validate.min.js','plugin/bootbox/bootbox.js','js/bootstrap-datepicker.min.js');
		$this->load->view('admin/tampilan_dasar',$data);
	}
	public function post(){
        $data['id'] = $_POST['kd_transaksi'];
        $data['id_pengguna'] = $_POST['pengguna'];
        $data['tgl_transaksi'] = date('Y-m-d');
        $data['tipe'] = 1;
        if(isset($_POST['pasien'])){
        	$data['id_pasien'] = $_POST['pasien'];
    	}
        $data['jumlah'] = $_POST['jml_bayar'];
            
        if($this->transaksi_model->add($data)){
        	for ($i=0; $i <count($_POST['obat']) ; $i++) { 
        		$data_detail['id_transaksi'] = $_POST['kd_transaksi'];
        		$data_detail['id_obat'] = $_POST['obat'][$i];
        		$data_detail['total'] = $_POST['jumlah'][$i];
        		$data_detail['jumlah_bayar'] = $_POST['subTotal'][$i];
        		$obat = $this->obat_model->get(array('id_obat'=>$data_detail['id_obat']))->row_array();
        		$obat_data['stok'] = $obat['stok'] - $_POST['jumlah'][$i];
        		$this->obat_model->update($data_detail['id_obat'],$obat_data);
        		$this->transaksi_model->addDetail($data_detail);

        	}
        	
            echo "1";
        }else{
            echo "0";
        }
    }
    public function postBeli(){
        $data['id'] = $_POST['kd_transaksi'];
        $data['id_pengguna'] = $_POST['pengguna'];
        $data['tgl_transaksi'] = date('Y-m-d');
        $data['tipe'] = 2;
        if(isset($_POST['pengirim'])){
        	$data['pengirim'] = $_POST['pengirim'];
    	}
        $data['jumlah'] = $_POST['jml_bayar'];
            
        if($this->transaksi_model->add($data)){
        	for ($i=0; $i <count($_POST['obat']) ; $i++) { 
        		$data_detail['id_transaksi'] = $_POST['kd_transaksi'];
        		$data_detail['id_obat'] = $_POST['obat'][$i];
        		$data_detail['total'] = $_POST['jumlah'][$i];
        		$data_detail['jumlah_bayar'] = $_POST['subTotal'][$i];
        		$obat = $this->obat_model->get(array('id_obat'=>$data_detail['id_obat']))->row_array();
        		$obat_data['stok'] = $obat['stok'] + $_POST['jumlah'][$i];
        		$this->obat_model->update($data_detail['id_obat'],$obat_data);
        		$this->transaksi_model->addDetail($data_detail);

        	}
        	
            echo "1";
        }else{
            echo "0";
        }
    }
    public function getTransaksi(){
    	$id = $_POST['idx'];
    	$data = [];
    	$data['master'] = $this->transaksi_model->get(array('transaksi_obat.id'=>$id))->row_array();
    	$data['detail'] = $this->transaksi_model->getDetail(array('id_transaksi'=>$id))->result_array();
    	echo json_encode($data);
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
