<?php
Class Paginateds extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('paginated');
    }
    function index(){
        $this->load->view('paginated/index');
    }
    function ajaxsource(){
        $params = $this->input->post();
        $objs = $this->paginated->gets($params['segment'],$params['offset']);
        $arr = array();
        echo json_encode($objs['res']);
    }
}