<?php
$host = 'localhost';
$user = 'root';
$pwd = '489329';
$database = 'computer';

$mysqli = new mysqli;
if ($mysqli->real_connect($host, $user, $pwd, $database)) {
    $mysqli->set_charset('UTF8');
}