<?php

$con = mysqli_connect("localhost", "root", "", "cinema");

if (!$con) {
    die('Connection Failed' . mysqli_connect_error());
}
