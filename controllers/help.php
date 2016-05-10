<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class help extends Controller {

    function __construct() {
        parent::__construct();

    }
    
   public function index($arg = false){
        $this->view->render("help/index");
    }
    public function other($arg = false){
        if($arg != false){
        //    newline();
        //    echo "Optional Arg: ".$arg;
        }     
        
        require "models/help_model.php";
        $model = new help_model();
    }
}
