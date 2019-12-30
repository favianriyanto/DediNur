<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

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
		$this->load->model(array('pasien_model','masuk_model'));
	}
	public function index(){
		$user = $this->masuk_model->get();
		$data['userdata'] = $user;
		$this->checkRole();
		$data['navbar']='admin/tampilan_navbar';
		$data['content']='admin/tampilan_pasien';
		$data['slide']=null;
		$data['sidebar']='admin/tampilan_sidebar';
		$data['title']='Pasien';

		$data['pasien'] = $this->pasien_model->get()->result_array();

		$data['scripts'] = array('js/admin/pasien.js','plugin/form-validation/jquery.validate.min.js','plugin/form-validation/extjquery.validate.min.js','plugin/bootbox/bootbox.js','js/bootstrap-datepicker.min.js');
		$this->load->view('admin/tampilan_dasar',$data);
	}
	public function post(){
		
        $data['id_pasien'] = $_POST['id_pasien'];
        if($_POST['id_pasien'] == 0){
		        $data['nama'] = $_POST['nama'];
		        $data['alamat'] = $_POST['alamat'];
		        $data['no_tlp'] = $_POST['no_telp'];
		        $data['tgl_lahir'] = $_POST['tgl_lahir'];
		        $data['jk'] = $_POST['jk'];
            if($this->pasien_model->add($data)){
                echo "1";
            }else{
                echo "0";
            }
        }else{
            	$data['nama'] = $_POST['nama'];
		        $data['alamat'] = $_POST['alamat'];
		        $data['no_tlp'] = $_POST['no_telp'];
		        $data['tgl_lahir'] = $_POST['tgl_lahir'];
		        $data['jk'] = $_POST['jk'];
            if($this->pasien_model->update($_POST['id_pasien'],$data)){
                echo "1";
            }else{
                echo "0";
            }
        }
	}
	public function getById(){
        $id = $_POST['idx'];
        $result = $this->pasien_model->get(array("id_pasien"=>$id))->row_array();
        echo json_encode($result);
    }
    public function delete(){
        $id = $_POST['id'];
        if($this->pasien_model->delete($id)){
            echo "1";
        }else{
            echo "0";
        }
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
