<?php
Class Main extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('padiauth');
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    function index(){

    }
    function login(){
        $this->load->view('main/login');
    }
    function loginhandler(){
        $params = $this->input->post();
        if($this->padiauth->checkAuth($params['email'],$params['password'])){
            redirect('/paginateds');
        }else{
            redirect('/main/login');
        }
    }
    function logout(){
        session_unset();
        session_destroy();
        redirect('/main/login');
    }
    function showdescription(){

        $data = array(
            'breadcrumb'=>array(
                '0'=>array('url'=>'/','label'=>'Main'),
                '1'=>array('url'=>'/','label'=>'Compare Description')
            ),
            'username'=>$_SESSION['username']
        );
        $this->load->view('main/showdescription',$data);
    }
}