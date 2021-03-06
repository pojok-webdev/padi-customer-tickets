<?php
Class Downtimes extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('downtime');
        $this->load->model('padiauth');
        $this->padiauth->checklogin();
    }
    function index(){
        $data = array(
            'pagetitle'=>'List of Downtime'
        );
        $this->load->view('downtimes/index',$data);
    }
    function add(){
        $downtimes = $this->downtime->gets($this->uri->segment(3));
        $data = array(
            'breadcrumb'=>array(
                '0'=>array('url'=>'/','label'=>'Downtime'),
                '1'=>array('url'=>'/','label'=>'Add')
            ),
            'pagetitle'=>'Add Downtime',
            'ticket_id'=>$this->uri->segment(3),
            'downtimes'=>$downtimes['res'],
            'username'=>$_SESSION['username']
        );
        $this->load->view('downtimes/add',$data);
    }
    function getMysqlDate($params,$column){
        $dt = $params[$column];
        $dtarray = explode(' ',$dt);
        $date = explode("/",$dtarray[0]);
        $params[$column] = $date[2].'-'.$date[1].'-'.$date[0].' '.$dtarray[1];
        return $params;
    }
    function save(){
        $params = $this->input->post();
        $params = $this->getMysqlDate($params,'downtimestart');
        $params = $this->getMysqlDate($params,'downtimeend');
        $params['createuser'] = $_SESSION['username'];
        echo json_encode($this->downtime->save($params));
    }
    function remove(){
        //$ticket_id = $this->uri->segment(3);
        $id = $this->uri->segment(3);
        $this->downtime->remove($id);
       // redirect('/downtimes/add/'.$ticket_id.'/'.$id);
    }
}