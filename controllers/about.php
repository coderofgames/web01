<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class about extends Controller{

    function __construct() {
        parent::__construct();
       // echo "We are in about";
    }
    public function index($arg = false){
        $this->view->render("about/index");
    }
}
