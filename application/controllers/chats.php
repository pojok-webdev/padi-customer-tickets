<?php
Class Chats extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('padiauth');
        $this->load->model('chat');
        $this->padiauth->checklogin();
    }
    function index(){
        $data = array(
            'breadcrumb'=>array(
                '0'=>array('url'=>'/','label'=>'Ticket'),
                '1'=>array('url'=>'/','label'=>'Add')
            ),
            'pagetitle'=>'List of Ticket',
            'ticketcauses'=>array(),'ticketcausecategories'=>array(),
            'username'=>$_SESSION['username'],
            'rowAmounts'=>array('5'=>'5','10'=>'10','15'=>'15','20'=>'20','25'=>'25'),
            'categories'=>array('1'=>'FFFFR','2'=>'Platinum','3'=>'Gold','4'=>'Bronze','5'=>'Silver',"6"=>"Others"),
            'years'=>array('1'=>date("Y"),'2'=>date("Y")-1,'3'=>date("Y")-2),
        );
        $this->load->view('chats/index',$data);
    }
    function getgroups(){
        $user_id = $this->uri->segment(3);
        $objs = $this->chat->getGroups($user_id);
        echo json_encode($objs['res']);
    }
    function getusers(){
        $user_id = $this->uri->segment(3);
        $objs = $this->chat->getUsers($user_id);
        echo json_encode($objs['res']);
    }
    function getchat(){
        $objs =$this->chat->getChat();
        echo json_encode($objs['res']);
    }
    function getgroupchat(){
        $group_id = $this->uri->segment(3);
        $objs = $this->chat->getgroupchat($group_id);
        echo json_encode($objs['res']);
    }
    function sendmessage(){
        $params = $this->input->post();
        echo $this->chat->sendmessage($params);
    }
    function getnewchats(){
        $objs = $this->chat->getnewchats();
        echo json_encode($objs['res']);
    }
}
