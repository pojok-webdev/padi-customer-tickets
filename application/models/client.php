<?php
Class Client extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getbyname($name){
        $sql = 'select id,name from clients ';
        $sql.= 'where name like "%'.$name.'%"';
        $sql.= 'limit 1,6';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getClientSiteByClientId($client_id){
        $sql = 'select id,address from client_sites ';
        $sql.= 'where client_id = "'.$client_id.'"';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
}