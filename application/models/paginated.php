<?php
Class Paginated extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function gets($segment,$offset){
        $sql = 'select a.id,kdticket,clientname name,ticketstart,ticketend,a.status,';
        $sql.= 'case a.status when "0" then "Open" when "1" then "Closed" end statuslabel,';
        $sql.= 'e.name subrootcause,f.name mainrootcause, ';
        $sql.= "case d.clientcategory ";
        $sql.= "when '1' then 'FFR' ";
        $sql.= "when '2' then 'Platinum' ";
        $sql.= "when '3' then 'Gold' ";
        $sql.= "when '4' then 'Silver' ";
        $sql.= "when '5' then 'Bronze' end clientcategory ";
        $sql.= 'from tickets a ';
        $sql.= ' left outer join client_sites c on c.id=a.client_site_id ';
        $sql.= ' left outer join clients d on d.id=a.client_id ';
        $sql.= ' left outer join ticketcauses e on e.id=a.cause_id ';
        $sql.= ' left outer join ticketcausecategories f on f.id=e.category_id ';
        $sql.= 'order by a.create_date desc ';
        $sql.= 'limit ' . $segment . ',' . $offset;
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result());
    }
    function getRowAmount(){
        $sql = 'select count(id) cnt from tickets ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $obj = $que->result();
        return $obj[0]->cnt;
    }
    function getPageAmount(){
        $rowamount = $this->getRowAmount();
        return ceil($rowamount/10);
    }
    function save($params){
        $sql = 'insert into tickets ';
        $sql.= '() ';
        $sql.= 'values ';
        $sql.= '()';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $obj = $que->result();
        return $obj[0]->cnt;
    }
}