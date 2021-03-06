<?php
Class Paginateds extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('paginated');
        $this->load->model('padiauth');
        $this->load->model('backbone');
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
            'years'=>array('1'=>date("Y"),'2'=>date("Y")-1,'3'=>date("Y")-2)
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
    function getbackbones(){
        $objs = $this->backbone->gets();
        $out = array();
        foreach($objs['res'] as $obj){
            $out[$obj->id]=$obj->name;
        }
        return $out;
    }
    function addbackbone(){
        $data = array(
            'breadcrumb'=>array(
                '0'=>array('url'=>'/','label'=>'Ticket'),
                '1'=>array('url'=>'/','label'=>'Add Backbone Ticket')
            ),
            'backbones'=>$this->getbackbones(),
            'pagetitle'=>'Add Backbone Ticket',
            'clients'=>array(),
            'username'=>$_SESSION['username']
        );
        $this->load->view('paginated/addbackbone',$data);
    }
    function save(){
        $params = $this->input->post();
        $dt = $params['ticketstart'];
        $dtarray = explode(' ',$dt);
        $date = explode("/",$dtarray[0]);
        $params['ticketstart'] = $date[2].'-'.$date[1].'-'.$date[0].' '.$dtarray[1];
        echo $this->paginated->save($params);
    }
    function getpropsbyparentid(){
        $parentid = $this->uri->segment(3);
        echo json_encode($this->paginated->getpropsbyparentid($parentid));
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
    function getchildrentickets(){
        $parentid = $this->uri->segment(3);
        $obj = $this->paginated->getchildrentickets($parentid);
        echo json_encode($obj);
    }
    function getticketstatus(){
        $ticketid = $this->uri->segment(3);
        $this->load->model('followup');
        echo json_encode($this->followup->getbyticketid($ticketid));
    }
    function search(){
        $params = $this->input->post();
        $objs = $this->paginated->search($params);
        echo json_encode($objs);
    }
    function searchByKdTicket(){
        echo json_encode($this->paginated->searchByKdTicket($this->uri->segment(3)));
    }
}