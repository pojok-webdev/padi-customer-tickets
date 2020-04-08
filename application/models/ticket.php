<?php
Class Ticket extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function gets(){
        $sql = 'select a.id,a.kdticket,e.name subrootcause,f.name mainrootcause,ticketstart,ticketend,"client" requesttype,';
        $sql.= "case d.clientcategory ";
        $sql.= "when '1' then 'FFR' ";
        $sql.= "when '2' then 'Platinum' ";
        $sql.= "when '3' then 'Gold' ";
        $sql.= "when '4' then 'Silver' ";
        $sql.= "when '5' then 'Bronze' end clientcategory,";
        $sql.= ' case a.status when "0" then "Open" when "1" then "Closed" end status,b.client_site_id bid,d.name name from ticketmains a ';
        $sql.= ' left outer join ticketclients b on b.ticket_id=a.id ';
        $sql.= ' left outer join client_sites c on c.id=b.client_site_id ';
        $sql.= ' left outer join clients d on d.id=c.client_id ';
        $sql.= ' left outer join ticketcauses e on e.id=a.cause_id ';
        $sql.= ' left outer join ticketcausecategories f on f.id=e.category_id ';
        $sql.= ' where b.id is not null ';
        $sql.= 'union ';
        $sql.= 'select a.id,a.kdticket,e.name subrootcause,f.name mainrootcause,ticketstart,ticketend,"backbone" requesttype,';
        $sql.= '"-" clientcategory,';
        $sql.= ' case a.status when "0" then "Open" when "1" then "Closed" end status,b.backbone_id bid, c.name from ticketmains a ';
        $sql.= ' left outer join ticketbackbones b on b.ticket_id=a.id ';
        $sql.= ' left outer join backbones c on c.id=b.backbone_id ';
        $sql.= ' left outer join ticketcauses e on e.id=a.cause_id ';
        $sql.= ' left outer join ticketcausecategories f on f.id=e.category_id ';
        $sql.= ' where b.id is not null ';
        $sql.= 'union ';
        $sql.= 'select a.id,a.kdticket,e.name subrootcause,f.name mainrootcause,ticketstart,ticketend,"bts" requesttype,';
        $sql.= '"-" clientcategory,';
        $sql.= ' case a.status when "0" then "Open" when "1" then "Closed" end status,b.btstower_id bid, c.name from ticketmains a ';
        $sql.= ' left outer join ticketbtses b on b.ticket_id=a.id ';
        $sql.= ' left outer join btstowers c on c.id=b.btstower_id ';
        $sql.= ' left outer join ticketcauses e on e.id=a.cause_id ';
        $sql.= ' left outer join ticketcausecategories f on f.id=e.category_id ';
        $sql.= ' where b.id is not null ';
        $sql.= 'union ';
        $sql.= 'select a.id,a.kdticket,e.name subrootcause,f.name mainrootcause,ticketstart,ticketend,"ap" requesttype,';
        $sql.= '"-" clientcategory,';
        $sql.= ' case a.status when "0" then "Open" when "1" then "Closed" end status,b.ap_id bid, c.name from ticketmains a ';
        $sql.= ' left outer join ticketaps b on b.ticket_id=a.id ';
        $sql.= ' left outer join aps c on c.id=b.ap_id ';
        $sql.= ' left outer join ticketcauses e on e.id=a.cause_id ';
        $sql.= ' left outer join ticketcausecategories f on f.id=e.category_id ';
        $sql.= ' where b.id is not null ';
        $sql.= 'union ';
        $sql.= 'select a.id,a.kdticket,e.name subrootcause,f.name mainrootcause,ticketstart,ticketend,"core" requesttype,';
        $sql.= '"-" clientcategory,';
        $sql.= ' case a.status when "0" then "Open" when "1" then "Closed" end status,b.core_id bid, c.name from ticketmains a ';
        $sql.= ' left outer join ticketcores b on b.ticket_id=a.id ';
        $sql.= ' left outer join cores c on c.id=b.core_id ';
        $sql.= ' left outer join ticketcauses e on e.id=a.cause_id ';
        $sql.= ' left outer join ticketcausecategories f on f.id=e.category_id ';
        $sql.= ' where b.id is not null ';
        $sql.= 'union ';
        $sql.= 'select a.id,a.kdticket,e.name subrootcause,f.name mainrootcause,ticketstart,ticketend,"datacenter" requesttype,';
        $sql.= '"-" clientcategory,';
        $sql.= ' case a.status when "0" then "Open" when "1" then "Closed" end status,b.datacenter_id bid, c.name from ticketmains a ';
        $sql.= ' left outer join ticketdatacenters b on b.ticket_id=a.id ';
        $sql.= ' left outer join datacenters c on c.id=b.datacenter_id ';
        $sql.= ' left outer join ticketcauses e on e.id=a.cause_id ';
        $sql.= ' left outer join ticketcausecategories f on f.id=e.category_id ';
        $sql.= ' where b.id is not null ';
        $sql.= 'union ';
        $sql.= 'select a.id,a.kdticket,e.name subrootcause,f.name mainrootcause,ticketstart,ticketend,"ptp" requesttype,';
        $sql.= '"-" clientcategory,';
        $sql.= ' case a.status when "0" then "Open" when "1" then "Closed" end status,b.ptp_id bid, c.name from ticketmains a ';
        $sql.= ' left outer join ticketptps b on b.ticket_id=a.id ';
        $sql.= ' left outer join ptps c on c.id=b.ptp_id ';
        $sql.= ' left outer join ticketcauses e on e.id=a.cause_id ';
        $sql.= ' left outer join ticketcausecategories f on f.id=e.category_id ';
        $sql.= ' where b.id is not null ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function save($params,$tablename){
        $keys = array();$vals = array();
        foreach($params as $key=>$val){
            array_push($keys,$key);
            array_push($vals,$val);
        }
        $sql = 'insert into '.$tablename.' ('.implode(',',$keys).') ';
        $sql.= 'values ';
        $sql.= '("'.implode('","',$vals).'") ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function backup($ticketid){
        $sql = 'insert into deletedtickets  ';
        $sql.= 'select * from tickets where id= '.$ticketid.' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function remove($ticketid){
        $sql = 'delete from tickets  ';
        $sql.= 'where id= '.$ticketid.' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
}