<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Session {

    //public static $session_started = false;
    public static function init(){
       // if( Session::$session_started == false)
        {
            @session_start();
            //Session::$session_started = true;
        }
       // $_SESSION["loggedIn"]=false;
    }
    
    public static function set($key, $value){
        //if( Session::$session_started == true) 
            $_SESSION[$key]=$value;
    }
    
    public static function get($key){
        if(isset( $_SESSION[$key]))
            return $_SESSION[$key];
        else return false;
    }
    
    public static function stop(){
        session_destroy();
        //Session::$session_started = false;
    }

}