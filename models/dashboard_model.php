<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class dashboard_model extends Model {

    function __construct() {
        parent::__construct();
    }

    function xhrInsert() {
        echo $text = $_POST['text'];

        //$sth = $this->db->prepare('INSERT INTO data (text) VALUES (:text)');
        //$sth->execute(array(':text' => $text));

        //$data = array('text' => $text, 'id' => $this->db->lastInsertId());
        $query_string = "INSERT INTO data (text) VALUES $text";
        
        $result = $this->database->query($query_string);        
        
        if( !$result ){
            echo "dashboard Error: Database insert failed";
        }
        
        $query_string_last_data = "SELECT * from data WHERE text == $text";
        $data = $this->database->query($query_string_last_data);  
        echo json_encode($data);
    }

    function xhrGetListings() {
        //$sth = $this->db->prepare('SELECT * FROM data');
        echo $query_string = "SELECT * FROM data";
        $data = $this->database->query($query_string);  
        //$sth->setFetchMode(PDO::FETCH_ASSOC);
        //$sth->execute();
        //$data = $sth->fetchAll();
        echo json_encode($data);
    }

    function xhrDeleteListing() {
        $id = $_POST['id'];
        $query_string = 'DELETE FROM data WHERE id = "' . $id . '"';
        echo $result = $this->database->query($query_string);         
        if( !$result ) echo "dashboard_model: error: could not delete listing";
        //$sth = $this->db->prepare('DELETE FROM data WHERE id = "' . $id . '"');
        //$sth->execute();
    }

}
