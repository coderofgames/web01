<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



//
function execute_query($con, $query_string_01)
{
    if (mysqli_query($con, $query_string_01)) {
        return true;
    } else {
        return false;
    }
}

//
//  Convenience function for dropping tables
//
function drop_table_if_exists($con, $table) {
    $query_string01 = "DROP TABLE IF EXISTS " . $table . ";";
    if (mysqli_query($con, $query_string_01)) {
        echo "Table $table dropped successfully". "</br>";
    } else {
        echo "Error dropping table: $table" . mysqli_error($conn). "</br>";
    }
}

//
//  Convenience function for creating tables (raw sql)
//
function create_table($conn, $query_string_01, $table_name) {
    if (mysqli_query($conn, $query_string_01)) {
       // echo "Table $table_name created successfully" . "</br>";
        return true;
    } else {
        echo "Error creating table $table_name: " . mysqli_error($conn) . "</br>";
    }
    
    return false;
}

//
//  Convenience function for creating tables with array notation
//
function create_table_from_array($conn, $arr, $table_name) {
    $query = "CREATE TABLE IF NOT EXISTS $table_name (";
    for ($c = 0; $c < sizeof($arr); $c++) {
        if ($c != 0)
            $query .= ",";
        for ($d = 0; $d < sizeof($arr[$c]); $d++) {
            $query .= $arr[$c][$d] . " ";
        }
    }
    $query .= ");";

    create_table($conn, $query, $table_name);
}

//
//  Convenience function for creating tables with JSON schema
//
function create_table_from_json_schema($conn, $schema, $table_name) {
    $schema = json_decode($schema, true);

    $query = "CREATE TABLE IF NOT EXISTS $table_name (";
    for ($i = 0; $i < count($schema); $i++) {
        if ($i != 0)
            $query .= ", ";
        $query .= $schema[$i]["name"] . " " . $schema[$i]["variable_type"] . " " . $schema[$i]["extra"];
    }
    $query .= ");";

    return create_table($conn, $query, $table_name);
}

//
// Simple database output printer
//
function output_db_table($m, $result, $input_str, $label_header, $label_table_header_db, $label_row, $table_filler_db){
    $label_header();
    $label_table_header_db($m, $input_str);
    $row_count = 0;
    while($rs = $result->fetch_array(MYSQLI_ASSOC)){
        $label_row($row_count);    
        for( $j = 0; $j < $m; $j++){
            $table_filler_db($row_count, $j, $m, $rs, $input_str); 
        }
        echo "</tr>";
	$row_count++;
    }
    echo "</table>";
}


