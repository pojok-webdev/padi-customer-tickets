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
        $sql.= '(';
        $sql.= 'requesttype,';
        $sql.= 'backbone_id,';
        $sql.= 'clientname,';
        $sql.= 'ticketstart,';
        $sql.= 'base64complaint,';
        $sql.= 'base64description,';
        $sql.= 'reporter,';
        $sql.= 'reporterphone';
        $sql.= ') ';
        $sql.= 'values ';
        $sql.= '(';
        $sql.= '"'.$params['requesttype'].'",';
        $sql.= '"'.$params['backbone_id'].'",';
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
    function clientsave($params){
        $sql = 'insert into tickets ';
        $sql.= '(';
        $sql.= 'requesttype,';
        $sql.= 'parentid,';
        $sql.= 'client_id,';
        $sql.= 'client_site_id,';
        $sql.= 'clientname,';
        $sql.= 'ticketstart,';
        $sql.= 'base64complaint,';
        $sql.= 'base64description,';
        $sql.= 'reporter,';
        $sql.= 'reporterphone';
        $sql.= ') ';
        $sql.= 'values ';
        $sql.= '(';
        $sql.= '"'.$params['requesttype'].'",';
        $sql.= ''.$params['parentid'].',';
        $sql.= ''.$params['client_id'].',';
        $sql.= ''.$params['client_site_id'].',';
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