<?php
Class Followup extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getbyticketid($ticketid){
        $sql = 'select a.id ticket_id,a.kdticket,a.clientname,reporter,complaint,reporterphone,solution,b.followUpDate from tickets a ';
        $sql.= 'left outer join ticket_followups b on b.ticket_id=a.id  ';
        $sql.= 'where a.id = ' . $ticketid . ' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        if($que->num_rows()>0){
            return $res[0];
        }
        return false;
    }
    function getfollowupsbyticketid($ticketid){
        $sql = 'select a.id,a.kdticket,a.clientname,a.reporter,a.complaint,a.reporterphone,a.solution,b.followupDate,username, ';
        $sql.= 'picname,';
        $sql.= 'a.base64description description,';
        $sql.= 'b.base64description fdescription,';
        $sql.= 'b.base64conclusion conclusion,';
        $sql.= 'case b.result when "0" then "Progress" when "1" then "OK" when "3" then "Tidak dapat dihubungi" end status,';
        $sql.= 'b.base64confirmationresult confirmationresult ';
        $sql.= 'from tickets a left outer join ticket_followups b on b.ticket_id=a.id ';
        $sql.= 'where a.id = ' . $ticketid . ' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getticketcauses($category_id){
        $sql = 'select * from ticketcauses ';
        $sql.= 'where category_id='.$category_id.' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getticketcausescategories(){
        $sql = 'select * from ticketcausecategories ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function save($params){
        $sql = 'insert into ticket_followups ';
        $sql.= '(ticket_id,picname,picphone,followUpDate,base64description) ';
        $sql.= 'values ';
        $sql.= '(';
        $sql.= ''.$params['ticket_id'].',';
        $sql.= '"'.$params['picname'].'",';
        $sql.= '"'.$params['picphone'].'",';
        $sql.= '"'.$params['followUpDate'].'",';
        $sql.= '"'.base64_encode($params['description']).'"';
        $sql.= ') ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function updateticket($params){
        $sql = 'update tickets ';
        $sql.= 'set base64solution="'.base64_encode($params['solution']).'" ';
        $sql.= 'where id='.$params['ticket_id'].' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function save_($params){
        $keys = array();$vals = array();
        foreach($params as $key=>$val){
            array_push($keys,$key);
            array_push($vals,$val);
        }
        $sql = 'insert into ticket_followups ';
        $sql.= '('.implode(',',$keys).') ';
        $sql.= 'values ';
        $sql.= '("'.implode('","',$vals).'")';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
}