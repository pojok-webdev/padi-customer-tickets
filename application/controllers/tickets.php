<?php
Class Tickets extends CI_Controller{
    function __construct(){
        parent::__construct();
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
        $this->load->view('ticket-insert/index');
    }
    function save(){
        $params = $this->input->post();
        echo $this->ticket->save($params);
    }
}