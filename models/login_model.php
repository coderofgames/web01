<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class login_model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function test()
    {
        
    }
    
    public function logout(){
        Session::set("loggedIn", false);
        header('location: ../login');
    }
    
    public function run(){
        echo "In Run";
        $login = $_POST['login'];
        $password = $_POST['password'];
        newline();
        echo $login.", ".$password;
        $query_string = "SELECT * FROM users WHERE login = '$login' AND password = '$password';";
        
        $result = $this->database->query($query_string);
        
        $login_success = false;
        if( !$result )
        {
            echo "login model failed to execute database query.";
        }
        else
        {
           
            newline();
            echo "Trying to fetch data from database";
            newline();
            $login_success = false;
            $count = 0;
            while($row = mysqli_fetch_array($result)) {
                if( $login == $row['login'] )
                {
                    if( $password == $row['password'] ) {
                        $login_success = true;
                    }
                    else {
                        newline();
                        echo "Password Incorrect";
                    }
                }
                else
                {
                    newline();
                    echo "Username Incorrect";
                }
                $count++;
            }       
            //print_r($row);
            newline();
            echo "count: ".$count;
            
            if( $count > 0)
            {
                Session::init();
                Session::set("loggedIn", true);
                header('location: ../Dashboard');
                //Session::stop();
            }
            else
            {
                header('location: index.php');
            }
        }
        
        // login should proceed as normal
        if( $login_success == true )
        {
            newline();
            echo "LOGGED IN";
        }
    }

}