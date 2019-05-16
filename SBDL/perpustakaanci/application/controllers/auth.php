<?php 
    class auth extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('model_userLog');
        }

        function login(){
            if(isset($_POST['submit'])){
                $username=$this->input->post['username'];
                $password=$this->input->post['password'];
                $berhasil=$this->model_userLog->login($username,$password);
                if($berhasil==1){
                    $this->session->set_userdata(array('status_login'=>'sukses'));
                    redirect('dasbor');
                }else{
                    redirect('index.php/auth/login');
                }

            }else{
                $this->load->view('form_login');
            }
        }
        function logout(){
            $this->session->sess_destroy();
            redirect('');
        }
    }
?>