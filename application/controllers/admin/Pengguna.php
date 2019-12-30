<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

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
        $this->load->model(array('masuk_model','user_model','transaksi_model','pengguna_model'));
	}
	public function index(){
        $user = $this->masuk_model->get();
		if(isset($user)){
			if($user['jabatan'] == 2){
				redirect('admin');
			}
		}
		$user = $this->masuk_model->get();
		$data['userdata'] = $user;
        $this->checkRole();
		$data['navbar']='admin/tampilan_navbar';
		$data['content']='admin/tampilan_pengguna';
		$data['slide']=null;
		$data['sidebar']='admin/tampilan_sidebar';
		$data['title']='Pengguna';

		$data['provider'] = $this->pengguna_model->get()->result_array();
		$data['scripts'] = array('js/admin/pengguna.js','plugin/form-validation/jquery.validate.min.js','plugin/form-validation/extjquery.validate.min.js','plugin/bootbox/bootbox.js','js/bootstrap-datepicker.min.js');
		$this->load->view('admin/tampilan_dasar',$data);
	}
	function checkPasswordAdmin(){
        $pass = md5($_POST['password_admin']);
        $id = $_POST['id'];
        $data = $this->pengguna_model->isPasswordAdmin($pass, $id);
        if($data){
            $result = true;
        }else{
            $result = false;
        }

        echo json_encode($result);
    }
    
    function changePass(){
   	 	$data['password'] = md5($_POST['new_password']);
	 	$id = $_POST['id'];
	    if($this->pengguna_model->changePass(array('id'=>$id),$data)){
	        echo "1";
	    }else{
	        echo "0";
	    }

    }
	 public function post(){
        $data_provider['password'] = md5($_POST['password']);
        $data_provider['username'] = $_POST['username'];
        $data_provider['role'] = 1;
        $data_provider['jabatan'] = $_POST['jabatan'];
        if($_POST['id_pengguna'] == 0){
        $user_id = $this->user_model->addUserLogin($data_provider);
        $data['alamat'] = $_POST['alamat'];
        $data['nama'] = $_POST['nama'];
        $data['no_hp'] = $_POST['telp'];
        $data['jk'] = $_POST['jk'];
        $data['jabatan'] = $_POST['jabatan'];
        $data['user_login_id'] = $user_id;
            if($provider_id = $this->pengguna_model->add($data)){
                echo "1";
            }else{
                echo "0";
            }
        }else{
        	$data_user_edit['username'] = $_POST['username'];
        	 $data['alamat'] = $_POST['alamat'];
            $data['nama'] = $_POST['nama'];
            $data['no_hp'] = $_POST['telp'];

            $data['jk'] = $_POST['jk'];
            $data['jabatan'] = $_POST['jabatan'];
        	$this->user_model->updateUserLogin($_POST['user_login_id'],$data_user_edit);
            if($this->pengguna_model->update($_POST['id_pengguna'],$data)){
                
                echo "1";
            }else{
                echo "0";
            }
        }
    }
    public function getById(){
        $id = $_POST['idx'];
        $result = $this->pengguna_model->get(array("id_pengguna"=>$id))->row_array();
        echo json_encode($result);
    }
    public function delete(){
        $id = $_POST['id'];
        if($this->pengguna_model->delete($id)){
            echo "1";
        }else{
            echo "0";
        }
    }
    function checkRole(){
		$user = $this->masuk_model->get();
		if(isset($user)){
			if($user['role'] == 1){
			
			}
            else{
				redirect('masuk');
			}
		}else{
			redirect('masuk');
		}
	}

}
