<?php
Class Followups extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('followup');
    }
    function create(){
        $ticketid = $this->uri->segment(3);
        $data = array(
            'obj'=>$this->followup->getbyticketid($ticketid),
            'categories'=>$this->followup->getticketcausescategories()
        );
        $this->load->view('followups/create',$data);
    }
    function getcausesajax(){
        $category_id = $this->uri->segment(3);
        $objs = $this->followup->getticketcauses($category_id);
        echo json_encode($objs['res']);
    }
}