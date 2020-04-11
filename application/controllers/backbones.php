<?php
Class Backbones extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function saveclient(){
        $params = $this->input->post();
        echo $this->backbone->saveclient($params);
    }
}