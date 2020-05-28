<?php
Class Paginated extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function gets($segment,$offset){
        $sql = 'select a.id,kdticket,clientname name,ticketstart,ticketend,a.status,';
        $sql.= 'case a.status when "0" then "Open" when "1" then "Closed" end statuslabel,';
        $sql.= 'e.name subrootcause,f.name mainrootcause, requesttype,';
        $sql.= 'case when parentid is null then false else  parentid end parentid,';
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
    function getpropsbyparentid($parentid){
        $sql = 'select b.name from tickets a ';
        $sql.= 'left outer join ticketcauses b on b.id=a.cause_id ';
        $sql.= 'where a.id = ' . $parentid . ' ';
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
        $sql.= '(';
        $sql.= 'parentid,';
        $sql.= 'client_id,';
        $sql.= 'client_site_id,';
        $sql.= 'clientname,';
        $sql.= 'reporter,';
        $sql.= 'reporterphone,';
        $sql.= 'ticketstart,';
        $sql.= 'base64complaint,';
        $sql.= 'base64description,';
        $sql.= 'requesttype';
        $sql.= ') ';
        $sql.= 'values ';
        $sql.= '(';
        $sql.= ''.$params['parentid'].',';
        $sql.= '"'.$params['client_id'].'",';
        $sql.= '"'.$params['client_site_id'].'",';
        $sql.= '"'.$params['clientname'].'",';
        $sql.= '"'.$params['reporter'].'",';
        $sql.= '"'.$params['reporterphone'].'",';
        $sql.= '"'.$params['ticketstart'].'",';
        $sql.= '"'.base64_encode($params['complain']).'",';
        $sql.= '"'.base64_encode($params['description']).'",';
        $sql.= '"'.$params['requesttype'].'"';
        $sql.= ')';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function getchildrentickets($parentid){
        $sql = 'select id,clientname from tickets ';
        $sql.= 'where parentid = ' . $parentid . ' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'cnt'=>$que->num_rows());
    }
    function search($params){
        $category = implode(",",$params['category']);
        $year = implode('","',$params['year']);
        $sql = 'select a.id,kdticket,clientname name,ticketstart,ticketend,a.status,';
        $sql.= 'case a.status when "0" then "Open" when "1" then "Closed" end statuslabel,';
        $sql.= 'e.name subrootcause,f.name mainrootcause, requesttype,';
        $sql.= 'case when parentid is null then false else  parentid end parentid,';
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
        $sql.= 'where ((upper(a.clientname) like "%' . strtoupper($params['searchvalue']) . '%")or(a.kdticket like "%' . $params['searchvalue'] . '%")) ';
        $sql.= 'and year(a.create_date) in ("'.$year.'") ';
        if(in_array('0',$params['category'])){
            
        }else{
            $sql.= 'and d.clientcategory in ('.$category.') ';
        }
        $sql.= 'order by a.create_date desc ';
        //$sql.= 'limit ' . $params['segment'] . ',' . $params['offset'];
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'sql'=>$sql);
    }
    function searchByKdTicket($params){
        $sql = 'select a.id,kdticket,clientname name,ticketstart,ticketend,a.status,';
        $sql.= 'case a.status when "0" then "Open" when "1" then "Closed" end statuslabel,';
        $sql.= 'e.name subrootcause,f.name mainrootcause, requesttype,';
        $sql.= 'case when parentid is null then false else  parentid end parentid,';
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
        $sql.= 'where a.kdticket = "%' . $params['kdticket'] . '%" ';
        $sql.= 'order by a.create_date desc ';
        //$sql.= 'limit ' . $params['segment'] . ',' . $params['offset'];
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array('res'=>$que->result(),'sql'=>$sql);
    }

}