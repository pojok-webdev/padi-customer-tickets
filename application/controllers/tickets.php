<?php
Class Tickets extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('padiauth');
        $this->padiauth->checklogin();
    }
    function index(){
        $data['objs'] = $this->ticket->gets();
        $this->load->view('tickets/index',$data);
    }
    function ajaxsource(){
        $objs = $this->ticket->gets();
        $arr = array();
        foreach($objs['res'] as $obj){
            array_push($arr,'[
                "'.$obj->kdticket.'",
                "'.$obj->name.'('.$obj->clientcategory.')",
                "'.$obj->status.'",
                "Subroot Cause:'.$obj->subrootcause.'<p>Mainroot Cause:'.$obj->mainrootcause.'",
                "'.$obj->ticketstart.'",
                "'.$obj->ticketend.'",
                "dura"
              ]');
        }
        echo '{"aaData": ['. implode(",",$arr).']}';
    }
    function insert(){
        $this->load->model('ticketcause');
        $data['ticketcauses'] = $this->ticketcause->getCauses();
        $this->load->view('ticket-insert/index',$data);
    }
    function save(){
        $params = $this->input->post();
        echo $this->ticket->save($params,'ticketmains');
    }
    function backup(){
        $ticketid = $this->uri->segment(3);
        $this->ticket->backup($ticketid);
    }
    function remove(){
        $ticketid = $this->uri->segment(3);
        $this->ticket->remove($ticketid);
    }
    function getbyid(){
        $id = $this->uri->segment(3);
        echo json_encode($this->ticket->getbyid($id));
    }
}