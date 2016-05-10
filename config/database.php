<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'config/databaseConfig.php';
require 'config/databaseFunctions.php';
//require 'config/DatabaseConnection.php';
/*$database_url= "localhost:3333";
$username = "root";
$password = "letmein";
$db_name = "mvc_1";*/

class Database {//extends PDO {
    
    private $database_url= "localhost";
    private $username = "root";
    private $password = "letmein";
    private $db_name = "mvc_1";
    
    private $users_json_schema = '[ {"name":"id",       "variable_type":"INT", 		"extra":"NOT NULL PRIMARY KEY" },
                                    {"name":"login", 	"variable_type":"VARCHAR(30)", 	"extra":""},
                                    {"name":"password", "variable_type":"VARCHAR(30)", 	"extra":""}
                                ]';

    private $users_table_name = "users";

    private $data_json_schema = '[ {"name":"id",       "variable_type":"INT", 		"extra":"NOT NULL PRIMARY KEY" },
                                    {"name":"text", 	"variable_type":"VARCHAR(3000)", 	"extra":""}
                                ]';

    private $datatable_name = "data";
//drop_table_if_exists($conn, $table_name);

  

    function __construct() {
        //parent::__construct( "mysq:lhost = localhost:3333; dbname = mvc_1", "root" , "letmein", array() );
       // parent::__c
        $this->conn = new mysqli($this->database_url, $this->username, $this->password);
        
        if( !$this->conn )
        {
            echo "Error: Database.php: SQL not available!";
        }
        
        //$query_string = "CREATE TABLE $tablename IF NOT EXISTS;";
        $query_string = "USE ".$this->db_name.";";
        
        $result=$this->conn->query($query_string);
        if(!$result)
        {
            echo "Error: Database.php: Failed to connect to database!";
        }
        
        $created = create_table_from_json_schema($this->conn, $this->users_json_schema, $this->users_table_name);
        
        if( $created )
        {
            $qs = "SELECT * FROM users;";
            $users_result = $this->conn->query($qs);
            
            $count = 0;
            while($row = mysqli_fetch_array($users_result)) {
                //row['course_no'];// . "<br>";
                $count++;
            }
            if($count == 0)
            { 
                $insert_qs = "INSERT INTO users (login, password) VALUES( 'dave', 'pass');";
                $insert_result = $this->conn->query($insert_qs);
                if(!$insert_result) echo "Error: Database.php: Cannot insert username and password into database";
            }
        }
        
        $created = create_table_from_json_schema($this->conn, $this->data_json_schema, $this->datatable_name);
    }
    
    public function query($qs){
        $result =$this->conn->query($qs);
        return $result;
    }
    
    public function execute_query( $qs )
    {
        if( !execute_query($this->conn, $qs))
        {
            return false;
        }
        
        return true;
    }

}
