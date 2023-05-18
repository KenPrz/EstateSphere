<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = 'traxex123lord';
$dbname = 'estatesphere';

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname))
{
    die("failed to connect!!!");
};