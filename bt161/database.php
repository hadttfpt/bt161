<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/23/2019
 * Time: 4:18 PM
 */
const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 't1811e';
function execute($sql){
    //conection to database
    $conn = new mysqli(HOST,USERNAME,PASSWORD,DATABASE);
    mysqli_set_charset($conn,'utf8');
//query
    mysqli_query($conn,$sql);
//close connection
    mysqli_close($conn);
}

function executeResult($sql){
    $conn = new mysqli(HOST,USERNAME,PASSWORD,DATABASE);
    mysqli_set_charset($conn,'utf8');
//query
    $resultset = mysqli_query($conn,$sql);
    $data = [];

    while($row = mysqli_fetch_array($resultset,1)){
        $data[] = $row;
    }
    //close connection
    mysqli_close($conn);
    return $data;
}

