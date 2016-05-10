<!DOCTYPE html>
<html>
    <head>   
        <!--<?php $arr=explode("\\",realpath(dirname(__FILE__))); echo $arr[count($arr)-1]; ?>-->
        <link rel="stylesheet" href="public/css/default.css" >
        <script src="public/js/jquery-1.11.0.min.js"></script>
        <script>
            /*$(document).ready(function(){
                alert("jquery is working");
            });*/
            </script>
	<script type="text/javascript" src="public/js/custom.js"></script>
	<?php
		if (isset($this->js)) 
		{
			foreach ($this->js as $js)
			{
				echo '<script type="text/javascript" src="views/'.$js.'"></script>';
			}
		}
	?>            
    </head>
    
    <body>
        <header id="header">
            <h1> TITLE PAGE </h1>
            <br />
            <a href="index">index</a>
            <a href="about">about</a>
            <a href="contact">contact</a>
            <a href="help">help</a>
            
            <?php 
            //require 'libs/Session.php';
            Session::init();
            $text = "";
            $loggedIn = Session::get('loggedIn');
            if( $loggedIn == false ){ ?>
        
            <a href="login" style = "float:right">login</a>
        
            <?php }else{ ?>
            
            <a href="dashboard">dashboard</a>
            <a href="login/logout" style="float:right"> logout</a>
        
            <?php } ?>
            

            
        
            <!--
            -->
        </header>
        <div id="content">
        
