<?php
Class Padiauth extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getSalt($email){
        $sql = 'select id,password,salt from users ';
        $sql.= 'where email="'.$email.'" ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        return array(
            'salt'=>substr($res[0]->password,0,10),
            'password'=>$res[0]->password
        );
    }
    function checkAuth($id,$password){
        $obj = $this->getSalt($id);
        $salt = $obj['salt'];
        $db_password =  $salt . substr(sha1($salt . $password), 0, -10);
        if($db_password===$obj['password']){
            return true;
        }else{
            return false;
        }
    }
}