<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class login extends Controller{

    function __construct() {
        parent::__construct();

    }
    public function index(){

        $this->view->render("login/index");
        
    }
    
    public function run($arg = false)
    {
        $this->model->run();
    }
    
    public function logout()
    {
        $this->model->logout();
    }
}