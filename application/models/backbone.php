<?php
Class Backbone extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function gets(){
        $sql = 'select id,name from backbones ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function save($params){
        $sql = 'insert into tickets ';
        $sql.= '(requesttype,parentid,clientname,ticketstart,base64complaint,base64description,reporter,reporterphone) ';
        $sql.= 'values ';
        $sql.= '(';
        $sql.= '"'.$params['requesttype'].'",';
        $sql.= ''.$params['parentid'].',';
        $sql.= '"'.$params['clientname'].'",';
        $sql.= '"'.$params['ticketstart'].'",';
        $sql.= '"'.base64_encode($params['complaint']).'",';
        $sql.= '"'.base64_encode($params['description']).'",';
        $sql.= '"'.$params['reporter'].'",';
        $sql.= '"'.$params['reporterphone'].'"';
        $sql.= ') ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
}