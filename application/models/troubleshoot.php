<?php
Class Troubleshoot extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getClient($ticketid){
        $sql = 'select a.id,c.name,c.address,a.reporter,a.reporterphone from tickets a ';
        $sql.= 'left outer join client_sites b on b.id=a.client_site_id ';
        $sql.= 'left outer join clients c on c.id=b.client_id ';
        $sql.= 'where a.id='.$ticketid.' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function save($params){
        $sql = 'insert into troubleshoot_requests ';
        $sql.= '(pic_name,pic_phone,pic_position,pic_email,troubleshoot_date,is_payable,description)';
        $sql.= 'values ';
        $sql.= '(';
        $sql.= '"'.$params['pic_name'].'",';
        $sql.= '"'.$params['pic_phone'].'",';
        $sql.= '"'.$params['pic_position'].'",';
        $sql.= '"'.$params['pic_email'].'",';
        $sql.= '"'.$params['troubleshoot_date'].'",';
        $sql.= '"'.$params['is_payable'].'",';
        $sql.= '"'.$params['description'].'"';
        $sql.= ')';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
}