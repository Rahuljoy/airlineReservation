 <!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    
    
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">

        </style>
    </head>
    <body>
        <?php
        require 'DBConnection/connection.php';
        ?>
        <div class="container" style="width:1880px">
            <div class="row">
                <div class="col-md-4">
                    <img src="images/air_logo.jpg" alt="air_logo" class="img-circle">  
                </div>
                <div class="col-md-8">
                    <h1>JS TRAVEL AGENCY <br/><small>Airline_Tickets_Reservatoin</small></h1>  
                </div>
            </div>
            <br/>
            <div class="row">
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="#">JS TRAVEL AGENCY</a>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="nav navbar-nav">
                                            <li><a href="#">Reservation</a></li>
                                            <li><a href="#">Confirmation</a></li>
                                            <li><a href="#">Help</a></li>
                                            
                                        </ul>
                                    </div>
                                    <div class="col-md-5">

                                    </div>
                                    <div class="col-md-3">
                                        <ul class="nav navbar-nav">
                                            <li><a href="#">FAQ</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                            <li class="active"><a href="#">Log In<br/><small>Admin</small></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="row">
                <div class="row">
                    <center>
                        <h1>View informetion</h1>
                    </center>
                </div>
                <br/>
                <div class="row">
                    <center>
                    <div class="row">
                           
                        </div>
                    </center>
                    </div>
            </div>
            </div>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>



