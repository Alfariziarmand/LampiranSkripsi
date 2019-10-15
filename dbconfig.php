<?php
//---------------DEFINE DB
//----------for localhost
// $databaseHost = 'localhost';
// $databaseName = 'id10347769_mydata';
// $databaseUsername = 'root';
// $databasePassword = '';

//-----------for uploaded
$databaseHost = 'localhost';
$databaseName = 'id10347769_mydata';
$databaseUsername = 'id10347769_mydata';
$databasePassword = 'mydata';


//---------------CONNECT MYSQL
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
