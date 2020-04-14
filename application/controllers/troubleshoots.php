<?php
Class Troubleshoots extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('troubleshoot');
        $this->load->model('padiauth');
        $this->padiauth->checklogin();
    }
    function add(){
        $ticketid = $this->uri->segment(3);
        $objs = $this->troubleshoot->getClient($ticketid);
        $data = array(
            'breadcrumb'=>array(
                '0'=>array('url'=>'/','label'=>'App'),
                '1'=>array('url'=>'/','label'=>'Troubleshoot')
            ),
            'ticketid'=>$ticketid,
            'obj'=>$objs['res'][0],
            'username'=>$_SESSION['username']
        );
       $this->load->view('troubleshoots/add',$data);
    }
    function save(){
        $params = $this->input->post();
        $dt = $params['troubleshoot_date'];
        $dtarray = explode(' ',$dt);
        $date = explode("/",$dtarray[0]);
        $params['troubleshoot_date'] = $date[2].'-'.$date[1].'-'.$date[0].' '.$dtarray[1];
        echo $this->troubleshoot->save($params);
    }
}