<?php
Class Followup extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getbyticketid($ticketid){
        $sql = 'select a.kdticket,a.clientname,reporter,complaint,reporterphone,solution from tickets a ';
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
    
}