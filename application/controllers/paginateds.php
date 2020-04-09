<?php
Class Paginateds extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('paginated');
        $this->load->model('padiauth');
        $this->padiauth->checklogin();
    }
    function index(){
        $data = array(
            'pagetitle'=>'List of Ticket',
            'username'=>$_SESSION['username']
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
            'pagetitle'=>'Add Ticket',
            'username'=>$_SESSION['username']
        );
        $this->load->view('paginated/add',$data);
    }
    function save(){
        $params = $this->input->post();
        $dt = $params['ticketstart'];
        $dtarray = explode(' ',$dt);
        $date = explode("/",$dtarray[0]);
        $params['ticketstart'] = $date[2].'-'.$date[1].'-'.$date[0].' '.$dtarray[1];
        echo $this->paginated->save($params);
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
            $out.= '<option value='.$obj->id.'>'.$obj->address.'</option>';
        }
        echo $out;
    }
    function downtimeadd(){
        $data = array(
            'breadcrumb'=>array(
                '0'=>array('url'=>'/','label'=>'Downtime'),
                '1'=>array('url'=>'/','label'=>'Add')
            ),
            'pagetitle'=>'Add Downtime'
        );
        $this->load->view('paginated/downtimeadd',$data);
    }
}