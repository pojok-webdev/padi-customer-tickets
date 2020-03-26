<?php
Class Ticketcause extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getCauses(){
        $sql = 'select id,name from ticketcauses ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
}