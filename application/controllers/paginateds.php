<?php
Class Paginateds extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('paginated');
    }
    function index(){
        $data = array(
            'pagetitle'=>'List of Ticket'
        );
        $this->load->view('paginated/index',$data);
    }
    function ajaxsource(){
        $params = $this->input->post();
        $objs = $this->paginated->gets($params['segment'],$params['offset']);
        $arr = array();
        echo json_encode($objs['res']);
    }
    function pageamount(){
        echo $this->paginated->getPageAmount();
    }
    function lastpage(){
        $lastpage = $this->paginated->getPageAmount();
        echo '{"lastpage":'.$lastpage.'}';
    }
    function add(){
        $data = array(
            'breadcrumb'=>array(
                '0'=>array('url'=>'/','label'=>'Ticket'),
                '1'=>array('url'=>'/','label'=>'Add')
            ),
            'pagetitle'=>'Add Ticket'
        );
        $this->load->view('paginated/add',$data);
    }
    function save(){
        $params = $this->input->post();
        $this->paginated->save($params);
    }
    function clients(){
        $params = $this->input->post();
        $this->load->model('client');
        $objs = $this->client->getbyname($params['name']);
        $out = '<ul id="clients" class="padiAutoComplete">';
        foreach($objs['res'] as $obj){
            $out.= '<li onClick="selectClient(\''.$obj->id.'\',\''.$obj->name.'\')">'.$obj->name.'</li>';
        }
        $out.= '</ul>';
        echo $out;
    }
    function getclientsites(){
        $client_id = $this->uri->segment(3);
        $this->load->model('client');
        $objs = $this->client->getClientSiteByClientId($client_id);
        $out = '';
        foreach($objs['res'] as $obj){
            $out.= '<option val='.$obj->id.'>'.$obj->address.'</option>';
        }
        echo $out;
    }}