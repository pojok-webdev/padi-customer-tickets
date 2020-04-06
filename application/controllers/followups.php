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
    function fixdateformat($params){
        $temp = explode(' ',$params);
        $dt = $temp[0];$tm = $temp[1];
        $date = explode("/",$dt);
        return $date[2].'-'.$date[1].'-'.$date[0].' '.$tm;
    }
    function save(){
        $params = $this->input->post();
        $params['followUpDate'] = $this->fixdateformat($params['followUpDate']);
        $this->updateticket($params);
        $this->followup->save($params);
        redirect('/paginateds/2');
    }
    function updateticket($params){
        echo $this->followup->updateticket($params);
    }
    function save_(){
        $allowable = array('ticket_id','picname','picphone','followUpDate','description');
        $params = $this->input->post();
        $params['followUpDate'] = $this->fixdateformat($params['followUpDate']);
        foreach($allowable as $alw){
            $obj[$alw] = $params[$alw];
        }
        echo $this->followup->save($obj);
    }
    function history(){
        $ticketid = $this->uri->segment(3);
        $data = array(
            'breadcrumb'=>array(
                '0'=>array('url'=>'/','label'=>'Follow Up'),
                '1'=>array('url'=>'/','label'=>'History')
            ),
            'ticketid'=>$ticketid,
            'objs'=>$this->followup->getbyticketid($ticketid)
        );
        $this->load->view('followups/history',$data);
    }
    function historyajaxsource(){
        $ticketid = $this->uri->segment(3);
        $objs = $this->followup->getfollowupsbyticketid($ticketid);
        echo json_encode($objs['res']);
    }
}