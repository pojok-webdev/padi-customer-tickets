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
    function saveclient($params){
        $sql = 'insert into tickets ';
        $sql.= '';
    }
}