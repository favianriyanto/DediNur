<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

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
		$this->load->model(array('merek_model','obat_model','masuk_model'));
	}
	public function index(){
		$user = $this->masuk_model->get();
		$data['userdata'] = $user;
		$this->checkRole();
		$data['navbar']='admin/tampilan_navbar';
		$data['content']='admin/tampilan_obat';
		$data['slide']=null;
		$data['sidebar']='admin/tampilan_sidebar';
		$data['title']='Obat';

		$data['obat'] = $this->obat_model->get()->result_array();
		$data['merek'] = $this->merek_model->get()->result_array();
		$data['scripts'] = array('js/admin/obat.js','plugin/form-validation/jquery.validate.min.js','plugin/bootbox/bootbox.js','js/bootstrap-datepicker.min.js');
		$this->load->view('admin/tampilan_dasar',$data);
	}	
	public function post(){
        $data['nama'] = $_POST['nama'];
        $data['deskripsi'] = $_POST['deskripsi'];
        $data['stok'] = $_POST['stok'];
        $data['merek'] = $_POST['merek'];
        $data['kategori'] = $_POST['kategori'];
        $data['harga'] = $_POST['harga'];
        if($_POST['id_obat'] == 0){
            
            if($this->obat_model->add($data)){
                echo "1";
            }else{
                echo "0";
            }
        }else{
           
            if($this->obat_model->update($_POST['id_obat'],$data)){
                echo "1";
            }else{
                echo "0";
            }
        }
	}
	public function getById(){
        $id = $_POST['idx'];
        $result = $this->obat_model->get(array("id_obat"=>$id))->row_array();
        echo json_encode($result);
    }
    public function delete(){
        $id = $_POST['id'];
        if($this->obat_model->delete($id)){
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
