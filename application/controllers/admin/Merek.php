<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merek extends CI_Controller {

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
		$this->load->model(array('merek_model','masuk_model'));
	}
	public function index(){
		$user = $this->masuk_model->get();
		$data['userdata'] = $user;
		$this->checkRole();
		$data['navbar']='admin/tampilan_navbar';
		$data['content']='admin/tampilan_merek';
		$data['slide']=null;
		$data['sidebar']='admin/tampilan_sidebar';
		$data['title']='Merek';

		$data['merek'] = $this->merek_model->get()->result_array();

		$data['scripts'] = array('js/admin/merek.js','plugin/form-validation/jquery.validate.min.js','plugin/bootbox/bootbox.js','js/bootstrap-datepicker.min.js');
		$this->load->view('admin/tampilan_dasar',$data);
	}
	public function post(){
        $data['nama'] = $_POST['nama'];
        $data['deskripsi'] = $_POST['deskripsi'];
        if($_POST['id_merek'] == 0){
            
            if($this->merek_model->add($data)){
                echo "1";
            }else{
                echo "0";
            }
        }else{
           
            if($this->merek_model->update($_POST['id_merek'],$data)){
                echo "1";
            }else{
                echo "0";
            }
        }
	}
	public function getById(){
        $id = $_POST['idx'];
        $result = $this->merek_model->get(array("id_merek"=>$id))->row_array();
        echo json_encode($result);
    }
    public function delete(){
        $id = $_POST['id'];
        if($this->merek_model->delete($id)){
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
