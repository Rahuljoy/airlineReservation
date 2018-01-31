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
                                            <li class="active"><a href="#">Log In</a></li>
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
                        <h3>Please Provide Your user_Name & PASSWORD Below</h3>
                    </center>
                </div>
                <br/>
                <div class="row">
                    <form name="userloginForm" action="userloginProcess.php" method="post">
                        <div class="col-md-6">
                            <div class="row" style="margin:5px">
                                <div class="form-group">
                                    <label for="name">User id</label>
                                    <input type="text" class="form-control" id="user_id" name="user_id">
                                    <!--<select class="form-control" id="name">
                                        <option>----Select name----</option>
                                    </select>!-->
                                </div>
                            </div>
                            <div class="row" style="margin:5px">
                                <div class="form-group">
                                    <label for="password">PASSWORD</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    <!--<select class="form-control" id="address">
                                        <option>----Select address----</option>
                                    </select>!-->
                                </div>
                            </div>
                            <?php
                        $db_user = array();

                        try {
                            $stmt = $conn->prepare('select * from db_user');
                            $read = $stmt->execute();
                            $db_user = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        } catch (Exception $ex) {
                            echo $ex->getMessage();
                        }
                        ?>
                            <div class="row" style="margin:5px">
                                <div class="form-group">
                                    <label for="user_type">User_type</label>
                                    <!--<input type="text" class="form-control" id="email" name="email">!-->
                                    <select class="form-control" id="user_type" name="type">
                                        <option>----Select user_type----</option>
                                         <?php
                                    foreach ($db_user as $user_type) {
                                  ?>
                                    <option><?php echo $user_type['Type']; ?></option>
                                    <?php
                                }
                                ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                       <!-- <div class="col-md-6">
                            <div class="row" style="margin:5px">
                                <div class="form-group">
                                    <label for="contactNo">Contact no</label>
                                    <input type="text" class="form-control" id="contactNo" name="contactNo">
                                    <!--<select class="form-control" id="contact no">
                                        <option>----Select contact no----</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin:5px">
                                <div class="form-group">
                                    <label for="passportNo">Passport no</label>
                                    <input type="text" class="form-control" id="passportNo" name="passportNo">
                                    <!--<select class="form-control" id="passport no">
                                        <option>----Select passport no----</option>
                                    </select>
                                </div>

                            </div>
                        </div>!-->
                        <div class="row">
                            <div class="col-md-10">
                                <input type="submit" class="btn btn-success" name="submit" id="Log_in" value="Log in"/>

                            </div>
                            <div class="col-md-2">
                               <!-- <input type="submit" class="btn btn-success" name="submit" id="Log_in" value="Log in"/>!-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>