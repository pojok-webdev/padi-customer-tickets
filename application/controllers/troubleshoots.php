<?php
Class Troubleshoots extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('followup');
        $this->load->model('padiauth');
        $this->padiauth->checklogin();
    }
    function add(){
        $ticketid = $this->uri->segment(3);
        $data = array(
            'breadcrumb'=>array(
                '0'=>array('url'=>'/','label'=>'App'),
                '1'=>array('url'=>'/','label'=>'Troubleshoot')
            ),
            'ticketid'=>$ticketid,
            'objs'=>array(),
            'username'=>$_SESSION['username']
        );
       $this->load->view('troubleshoots/add',$data);
    }
}