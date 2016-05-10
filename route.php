<?php
require "libs/utils.php";
class Route {
    
    #code
    
    private $_uri = array();
    
    private $current_controller = "";
    
    /**
     *   builds a colletion of
     *   internal URL's to look for.
     */
    public function add($uri)
    {
        $this->_uri[] = trim($uri, '/');
    }
    
    /*
     *
     */
    public function submit()
    {


        $uriGetParam = $_SERVER['REQUEST_URI'];
        $server_root = $_SERVER['DOCUMENT_ROOT'];
        $real_path = realpath(dirname(__FILE__));
        
        

        $real_path = str_replace('\\', '/', $real_path);
        $server_root = str_replace('\\', '/', $server_root);
        
       
        $size_diff = 0;
        $subdir = "";
        
        
        $server_root2 = explode("/", $server_root);
        $real_path2 = explode("/", $real_path);
        

        $server_root_count = count($server_root2);
        $real_path_count = count($real_path2);
        
        if( $server_root_count > $real_path_count )
        {
            $size_diff = $server_root_count - $real_path_count;
        }
        else if( $real_path_count > $server_root_count )
        {
            $size_diff = $real_path_count -$server_root_count ;
        }
        
        

        $routes = explode( "/",$uriGetParam);
        $routes_count = count($routes);

        for($i = 0; $i < $routes_count; $i++)
        {
            $routes[$i] = strtolower($routes[$i]);
        }
        
        $controller_index = 1;
        if( $size_diff != 0 && isset($routes[1]))
        {
            $controller_index = 1 + $size_diff;
        }
        
        $controller_name = "";
        $action = "";
        $arg = "";

        if( isset($routes[$controller_index]))
        {
            
            $controller_name = $routes[$controller_index];
        }
        
        if( isset($routes[$controller_index+1]))
        {
            $action = $routes[$controller_index+1];
        }
        
        if( isset($routes[$controller_index+2]))
        {
            $arg = $routes[$controller_index+2];
        }
        
        
            
        if( $controller_name == "") $controller_name= "index";
            
        $filename = "controllers/".$controller_name.".php";
                    
        if( file_exists ( $filename ))
        {
            //if( $_SESSION["controller_name"] != $controller_name )
            {
                require $filename;
                $controller = new $controller_name;
                $controller->load_model($controller_name);
                $this->current_controller = $controller_name;
                //$_SESSION["controller_name"] = $controller_name;
                //$_SESSION["controller_name"] = $controller_name;
                
                $controller->index();
            }
            
                
            if( $action != "")
            {
                if( method_exists($controller, $action ))
                {
                    if( $arg != "" )
                    {
                        $controller->$action($arg);
                    }
                    else
                    {
                        
                        $controller->$action();
                    }
                }
                else
                {
                    newline();
                    echo "404 unknown resource";
                }
            }
        }
        else
        {
            newline();
            require "controllers/error.php";
            $controller = new error;
            
        }
            
        //newline();
            


       /* foreach($this->_uri as $key => $value)
        {

            //newline();
            if( $routes[count($routes)-1] == $value)
            {
             //   echo "match!" . " " . "$value";
            }
         }*/
        
    }
}

?>