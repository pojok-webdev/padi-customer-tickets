<?php
Class Downtime extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function gets($ticket_id){
        $sql = 'select id,start,end,createuser from downtimes ';
        $sql.= 'where ticket_id = "'.$ticket_id.'"';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function save($params){
        $sql = 'insert into downtimes ';
        $sql.= '(ticket_id,start,end,createuser)';
        $sql.= 'values ';
        $sql.= '("'.$params['ticket_id'].'","'.$params['downtimestart'].'","'.$params['downtimeend'].'","'.$params['createuser'].'")';
        $ci = & get_instance();
        $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function remove($id){
        $sql = 'delete from downtimes ';
        $sql.= 'where id='.$id.' ';
        $ci = & get_instance();
        $ci->db->query($sql);
        return $ci->db->insert_id();
    }
}