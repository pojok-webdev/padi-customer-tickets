<?php
class Chat extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getChat(){
        $sql = 'select a.id,a.parentid,a.content,a.creator_id,b.username,a.createdate from zchats a ';
        $sql.= 'left outer join users b on b.id=a.creator_id ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getnewchats(){
        $sql = 'select a.id,a.parentid,a.content,a.creator_id,b.username,a.createdate from zchats a ';
        $sql.= 'left outer join users b on b.id=a.creator_id ';
        //$sql.= 'where ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getgroupchat($target_id){
        $sql = 'select a.id,a.parentid,a.content,a.creator_id,b.username,a.createdate from zchats a ';
        $sql.= 'left outer join users b on b.id=a.creator_id ';
        $sql.= 'where a.target_id='.$target_id.' ';
        $sql.= 'and a.targettype="0" ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
        );
    }
    function getuserchat($user_id,$target_id){
        $sql = 'select a.id,a.parentid,a.content,a.creator_id,b.username,a.createdate from zchats a ';
        $sql.= 'left outer join users b on b.id=a.creator_id ';
        $sql.= 'where (a.creator_id='.$user_id.' ';
        $sql.= 'and a.target_id='.$target_id.') ';
        $sql.= 'or (a.target_id='.$user_id.' and a.creator_id='.$target_id.') ';
        $sql.= 'and a.targettype="1" ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),'cnt'=>$que->num_rows()
            //'res'=>$sql,'cnt'=>$que->num_rows()
        );
    }
    function getGroups($user_id){
        $sql = 'select a.id,a.name,a.description from zgroups a left outer join zgroups_users b ';
        $sql.= 'on a.id=b.group_id ';
        $sql.= 'where b.group_id is not null ';
        $sql.= 'and b.user_id = ' . $user_id . ' ';
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
        $sql = 'insert into zchats ';
        $sql.= '(content,creator_id,target_id,targettype)';
        $sql.= 'values ';
        $sql.= '("'.$params['content'].'",'.$params['user_id'].','.$params['target_id'].','.$params['targettype'].')';
        $ci = & get_instance();
        $ci = $ci->db->query($sql);
        return 0;
//        return $ci->db->insert_id();
    }
}