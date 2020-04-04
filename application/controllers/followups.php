<?php
Class Followups extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function create(){
        $ticketid = $this->uri->segment(3);
        $this->load->view('followups/create');
    }
}