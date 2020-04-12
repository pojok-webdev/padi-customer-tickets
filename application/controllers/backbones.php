<?php
Class Backbones extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('backbone');
    }
    function saveclient(){
        $params = $this->input->post();
        echo $this->backbone->saveclient($params);
    }
    function save(){
        $params = $this->input->post();
        $dt = $params['ticketstart'];
        $dtarray = explode(' ',$dt);
        $date = explode("/",$dtarray[0]);
        $params['ticketstart'] = $date[2].'-'.$date[1].'-'.$date[0].' '.$dtarray[1];
        $id = $this->backbone->save($params);
        echo '{"id":'.$id.'}';
    }
    function clientsave(){
        $params = $this->input->post();
        $dt = $params['ticketstart'];
        $dtarray = explode(' ',$dt);
        $date = explode("/",$dtarray[0]);
        $params['ticketstart'] = $date[2].'-'.$date[1].'-'.$date[0].' '.$dtarray[1];
        $id = $this->backbone->clientsave($params);
        echo '{"id":'.$id.'}';
    }
}