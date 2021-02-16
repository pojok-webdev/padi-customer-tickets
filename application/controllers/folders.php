<?php
Class Folders extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('client');
    }
    function getclients(){
        $objs = $this->client->getall();
        echo 'Total '.$objs['cnt'].'<br />';
        foreach($objs['res'] as $cln){
            echo $cln->name;
            echo '<br />';
            $this->create($cln->name);
        }
    }
    function create($client){
        if(!mkdir("/home/webdev/padiappfolders/".$client,7777,true)){
            echo "Cant create folder";
        }
    }
    function ftpmkdir(){
        $dir = 'Task%20List/Sales/Puji%20Widi%20P/directories';
        $ftp_server = "192.168.0.234";
        // set up basic connection
        $conn_id = ftp_connect($ftp_server);

        // login with username and password
        $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

        // try to create the directory $dir
        if (ftp_mkdir($conn_id, $dir)) {
        echo "successfully created $dir\n";
        } else {
        echo "There was a problem while creating $dir\n";
        }

        // close the connection
        ftp_close($conn_id);
    }
}