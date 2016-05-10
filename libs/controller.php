<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller {


    function __construct() {
       // echo "Main Controller";
       // newline();
        $this->view = new View();
    }
    
    public function load_model($name){
        $path = 'models/'.$name.'_model.php';
        if(file_exists($path))
        {
            require $path;
            $model_name = $name."_model";
            $this->model = new $model_name();
        }
    }

}

