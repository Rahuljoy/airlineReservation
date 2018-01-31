<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
                        <h3>Manage Airline Info </h3>
                    </center>
                </div>
                <br/>
                <div class="row">
                    <form name="manageairlineinfo" action="savemanageairlineinfoprocess.php" method="post">
                        <center>
                            <div class="col-md-10">
                                <div class="row" style="margin:5px">
                                    <div class="form-group">
                                        <label for="name">Company Name</label>
                                        <input type="text" class="form-control" id="name" name="name">

                                    </div>
                                </div>
                                <div class="row" style="margin:5px">
                                    <div class="form-group">
                                        <label for="address">Company Address</label>
                                        <input type="text" class="form-control" id="address" name="address">
                                    </div>
                                </div>
                                <div class="row" style="margin:5px">
                                    <div class="form-group">
                                        <label for="email">Company Email</label>
                                        <input type="text" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                                <div class="row" style="margin:5px">
                                    <div class="form-group">
                                        <label for="contactNo">Company Contact no</label>
                                        <input type="text" class="form-control" id="contactNo" name="contactNo">
                                    </div>
                                </div>
                                <div class="row" style="margin:5px">
                                    <div class="form-group">
                                        <label for="serviceName">Service name</label>
                                        <input type="text" class="form-control" id="serviceName" name="serviceName">
                                    </div>
                                </div>


                                <div class="col-md-2">

                                </div>
                        </center>
                        <br/>
                        <div class="row">
                            <div class="col-md-3">

                                <input type="submit" class="btn btn-success" name="save" id="save" value="save"/>

                            </div>
                            <div class="col-md-9">

                            </div>
                        </div>
                    </form>
                </div>
                <br>
                <div>
                    <center>
                        <div class="row">
                            <center>
                                <div class="col-md-8">
                                    <?php
                                    //read data
                                    $airline_comp = array();
                                    try {
                                        $stmt = $conn->prepare('select * from airline_comp');
                                        $read = $stmt->execute();
                                        $airline_comp = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    } catch (Exception $ex) {
                                        echo $ex->getMessage();
                                    }
                                    ?>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Company Id</th>
                                                <th>Company Name</th>
                                                <th>Company Address</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //loop
                                            foreach ($airline_comp as $airline) {
                                                
                                                    ?>
                                                    <tr>
                                                        <td>
                                                    <?php
                                                    //print data

                                                    echo $airline['Com_id'];
                                                    ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            //print data
                                                           
                                                                echo $airline['Com_name'];
                                                            
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            //print data
                                                                echo $airline['Com_address'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="viewProcess.php?comId=<?php echo $airline['Com_id']; ?>"> <button type="button">View</button> </a>
                                                            <button type="button">Edit</button>
                                                            <button type="button">Delete</button>
                                                        </td>
                                                    </tr>
                                                            <?php
                                                        
                                                        //end php loop
                                                    }
                                                    ?>
                                        </tbody>
                                    </table> 
                                </div>
                            </center>
                            <div class="col-md-2">

                            </div>

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

