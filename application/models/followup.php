<?php
Class Followup extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getbyticketid($ticketid){
        $sql = 'select a.id ticket_id,a.kdticket,a.clientname,reporter,complaint,reporterphone,solution,b.followUpDate,a.status, ';
        $sql.= 'case a.status when "0" then "Open" when "1" then "Closed" end statuslabel ';
        $sql.= 'from tickets a ';
        $sql.= 'left outer join ticket_followups b on b.ticket_id=a.id  ';
        $sql.= 'where a.id = ' . $ticketid . ' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        if($que->num_rows()>0){
            return $res[0];
        }
        return false;
    }
    function getfollowupsbyticketid($ticketid){
        $sql = 'select b.id,b.kdticket,b.clientname,b.reporter,b.complaint,b.reporterphone,b.solution,a.followupDate,a.username, ';
        $sql.= 'case f.clientcategory ';
        $sql.= 'when "1" then "FFR" ';
        $sql.= 'when "2" then "Platinum" ';
        $sql.= 'when "3" then "Gold" ';
        $sql.= 'when "4" then "Bronze" ';
        $sql.= 'when "5" then "Silver" ';
        $sql.= 'else  "Uncategorized" ';
        $sql.= 'end clientcategory, ';
        $sql.= 'picname,c.name subcause,d.name rootcause,e.address,';
        $sql.= 'case when b.base64description is null then "" else b.base64description end description,';
        $sql.= 'case when a.base64description is null then "" else a.base64description end fdescription,';
        $sql.= 'case when a.description is null then "" else a.description end fudescription,';
        $sql.= 'case when a.base64conclusion is null then "" else a.base64conclusion end conclusion,';
        $sql.= 'case a.result when "0" then "Progress" when "1" then "OK" when "3" then "Tidak dapat dihubungi" end status,';
        $sql.= 'a.base64confirmationresult confirmationresult ';
        $sql.= 'from ticket_followups a left outer join tickets b on a.ticket_id=b.id ';
        $sql.= 'left outer join ticketcauses c on c.id=a.cause_id ';
        $sql.= 'left outer join ticketcausecategories d on d.id=c.category_id ';
        $sql.= 'left outer join client_sites e on e.id=b.client_site_id ';
        $sql.= 'left outer join clients f on f.id=e.client_id ';
        $sql.= 'where b.id = ' . $ticketid . '  ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getticketcauses($category_id){
        $sql = 'select * from ticketcauses ';
        $sql.= 'where category_id='.$category_id.' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getticketcausescategories(){
        $sql = 'select * from ticketcausecategories ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function save($params){
        $sql = 'insert into ticket_followups ';
        $sql.= '(';
        $sql.= 'ticket_id,';
        $sql.= 'picname,';
        $sql.= 'position,';
        $sql.= 'picphone,';
        $sql.= 'followUpDate,';
        $sql.= 'result,';
        $sql.= 'cause_id,';
        $sql.= 'base64conclusion,';
        $sql.= 'base64confirmationresult,';
        $sql.= 'base64description';
        $sql.= ') ';
        $sql.= 'values ';
        $sql.= '(';
        $sql.= ''.$params['ticket_id'].',';
        $sql.= '"'.$params['picname'].'",';
        $sql.= '"'.$params['position'].'",';
        $sql.= '"'.$params['picphone'].'",';
        $sql.= '"'.$params['followUpDate'].'",';
        $sql.= '"'.$params['result'].'",';
        $sql.= '"'.$params['cause_id'].'",';
        $sql.= '"'.base64_encode($params['solution']).'",';
        $sql.= '"'.base64_encode($params['confirmationresult']).'",';
        $sql.= '"'.base64_encode($params['description']).'"';
        $sql.= ') ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function saveresult(){
        $sql = 'insert into ticket_followups ';
        $sql.= '(ticket_id,picname,position,picphone,followUpDate,result,base64conclusion,base64confirmationresult,base64description) ';
        $sql.= 'values ';
        $sql.= '(';
        $sql.= ''.$params['ticket_id'].',';
        $sql.= '"'.$params['picname'].'",';
        $sql.= '"'.$params['position'].'",';
        $sql.= '"'.$params['picphone'].'",';
        $sql.= '"'.$params['followUpDate'].'",';
        $sql.= '"'.$params['result'].'",';
        $sql.= '"'.base64_encode($params['solution']).'",';
        $sql.= '"'.base64_encode($params['confirmationresult']).'",';
        $sql.= '"'.base64_encode($params['description']).'"';
        $sql.= ') ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function updateticket($params){
        $out = array();
        foreach($params as $key=>$val){
            array_push($out,$key.'="'.$val.'"');
        }
        $sql = 'update tickets set ' . implode(',',$out). ' ';
        $sql.= 'where id = ' . $params['id'] . ' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
    }
    function updateticketsolution($params){
        $sql = 'update tickets ';
        $sql.= 'set base64solution="'.base64_encode($params['solution']).'" ';
        $sql.= 'where id='.$params['ticket_id'].' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function save_($params){
        $keys = array();$vals = array();
        foreach($params as $key=>$val){
            array_push($keys,$key);
            array_push($vals,$val);
        }
        $sql = 'insert into ticket_followups ';
        $sql.= '('.implode(',',$keys).') ';
        $sql.= 'values ';
        $sql.= '("'.implode('","',$vals).'")';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function convertchartobase64($id){
        $sql = 'select description from ticket_followups ';
        $sql.= 'where id='.$id;
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        if($que->num_rows()>0){
            $obj = $res[0];

            $sql = 'update ticket_followups ';
            $sql.= 'set base64description="'.base64_encode($obj->description).'" ';
            $sql.= 'where id='.$id.' ';
            $que = $ci->db->query($sql);
            return $sql;
        }
        return false;
    }
    function convertalldescription(){
        $sql = 'select id,description from ticket_followups ';
        $sql.= 'where description is not null and base64description is null ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        foreach($res as $rawtext){
            $sql = 'update ticket_followups ';
            $sql.= 'set base64description="'.base64_encode($rawtext->description).'" ';
            $sql.= 'where id='.$rawtext->id.' ';
            $que = $ci->db->query($sql);
        }
    }
    function getallfus(){
        $sql = 'select id,description,base64description from ticket_followups ';
        $sql.= 'where description is not null and base64description is null ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result();
    }
}