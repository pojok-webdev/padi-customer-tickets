<?php
Class Padiauth extends CI_Model{
    function __construct(){
        parent::__construct();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    function getSalt($email){
        $sql = 'select id,username,email,password,salt from users ';
        $sql.= 'where email="'.$email.'" ';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        return $res[0];
    }
    function checkAuth($email,$password){
        $obj = $this->getSalt($email);
        $salt = substr($obj->password, 0, 10);
        $db_password =  $salt . substr(sha1($salt . $password), 0, -10);
        if($db_password===$obj->password){
            $_SESSION["username"] = $obj->username;
            return true;
        }else{
            return false;
        }
    }
    function checklogin(){
        if(!$_SESSION['username']){
            redirect('/main/login');
        }
        /*if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }else{
            redirect('/main/login');
        }
*/
    }
}