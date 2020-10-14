<?php
class Chat extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getChat(){
        $sql = 'select a.id,a.parentid,a.content,a.user_id,b.username,a.createdate from padichats a ';
        $sql.= 'left outer join users b on b.id=a.user_id ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getnewchats(){
        $sql = 'select a.id,a.parentid,a.content,a.user_id,b.username,a.createdate from padichats a ';
        $sql.= 'left outer join users b on b.id=a.user_id ';
        //$sql.= 'where ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getgroupchat($group_id){
        $sql = 'select a.id,a.parentid,a.content,a.user_id,b.username,a.createdate from padichats a ';
        $sql.= 'left outer join users b on b.id=a.user_id ';
        $sql.= 'where a.group_id='.$group_id.' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getGroups($user_id){
        $sql = 'select b.id,b.name,b.description from padiuserchats a left outer join padigroupchats b ';
        $sql.= 'on b.id=a.group_id ';
        $sql.= 'where b.id is not null ';
        $sql.= 'and a.user_id = ' . $user_id . ' ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getUsers($user_id){
        $sql = 'select a.id,a.username from users a ';
        $sql.= 'where a.id<>'.$user_id.' ';
        $sql.= 'and a.active = "1" and a.status="1" ';
        $sql.= 'order by a.username asc ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function sendmessage($params){
        $sql = 'insert into padichats ';
        $sql.= '(content,user_id)';
        $sql.= 'values ';
        $sql.= '("'.$params['content'].'",'.$params['user_id'].')';
        $ci = & get_instance();
        $ci = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
}