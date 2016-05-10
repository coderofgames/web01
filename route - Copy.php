<?php

class Header {
    
    #code
    
    private $html = "";
    
    /**
     *   builds a colletion of
     *   internal URL's to look for.
     */
    public function add($_html)
    {
        $this->$html = $_html;
    }
    
    /*
     *
     */
    public function submit()
    {

        echo $uriGetParam = $_SERVER['REQUEST_URI'];//isset($_GET['uri']) ? $_GET['uri'] : '/';
        echo "<br>";
        echo $_SERVER["SCRIPT_NAME"];
        echo "<br>";
        echo $_SERVER["SERVER_NAME"];
        echo "<br>";
        echo $_SERVER['DOCUMENT_ROOT'];
        echo "<br>";
        echo realpath(dirname(__FILE__));
        echo "<br>";
        echo base_url(NULL, NULL, TRUE)["path"];
        echo "<br>";
        $routes = explode( "/",$uriGetParam);
        foreach($this->_uri as $key => $value)
        {
            //echo $value;
            echo "<br>";
            if( $routes[$routes.length()-1] == $value)
            {
                echo "match!" . " " . "$value";
            }
        }
    }
}

?>