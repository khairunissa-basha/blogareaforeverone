<?php
ob_start();

session_start();
include "dbh.php";
?>

<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <!-- importing icon liberary-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--adding own css file-->
    <link rel="stylesheet" href="../css/icons.css">
    <style>
        header,footer, .main{
            padding-left:300px;
        }
        @media(max-width:992px){
            header,footer,.main{
            padding-left:0px;
        }
        }
        </style>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>first blog website</title>
</head>