<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class View {

    function __construct() {
        
    }

    
    public function render($name)
    {
        require "views/header.php"; 
        require "views/".$name.".php";
        require "views/footer.php";
    }
}
