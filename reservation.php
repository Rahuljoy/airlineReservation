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
             #seatRows{
                 width:100%;
                 height:40px;
             }
             #ecoSeatCol{
                 width: 13%;
             }
             #ecoCorridor{
                 width: 11%;
             }
             #busSeatCol{
                 width: 10%;
             }
             #busCorridor{
                 width: 5%;
             }
             #ecoSeat{
                 width: 95%;
                 margin: 3px;
             }
             #busSeat{
                 width: 95%;
                 margin: 3px;
             }
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
                                        <li class="active"><a href="#">Reservation</a></li>
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
                                        <li><a href="#">Log In</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <?php
            $places = array();
            
            try{
                $stmt = $conn->prepare('select * from places');
                $read = $stmt->execute();
                $places = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        ?>
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <h3>
                        Choose Your Flight Here
                    </h3>
                </div>
                <div class="row" style="margin-right: 5px">
                    <form  name="submitconnection" action="reservationInfoProcess.php" method="post">
                        <div class="form-group">
                            <label for="from">From</label>
                            <select class="form-control" id="from" name="from">
                                <option>--Select Location--</option>
                                <?php
                                    foreach ($places as $location){
                                ?>
                                <option><?php echo $location['place'] . ', ' . $location['country'];?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="to">To</label>
                            <select class="form-control" id="to" name="to">
                                <option>--Select Location--</option>
                                <?php
                                    foreach ($places as $location){
                                ?>
                                <option><?php echo $location['place'] . ', ' . $location['country'];?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input class="form-control" type="date" name="date" id="date" />
                        </div>
                        <?php
                        $airline_comp = array();

                        try {
                            $stmt = $conn->prepare('select * from airline_comp');
                            $read = $stmt->execute();
                            $airline_comp = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        } catch (Exception $ex) {
                            echo $ex->getMessage();
                        }
                        ?>
                        <div class="form-group">
                            <label for="airline">Airline</label>
                            <select class="form-control" id="airline" name="airline">
                                <option>----Select Airlines----</option>
                                <?php
                                    foreach ($airline_comp as $airline) {
                                  ?>
                                    <option><?php echo $airline['Service_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <?php
                        $flight = array();

                        try {
                            $stmt = $conn->prepare('select * from flight');
                            $read = $stmt->execute();
                            $flight = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        } catch (Exception $ex) {
                            echo $ex->getMessage();
                        }
                        ?>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <select class="form-control" id="time" name="time">
                                <option>---Time---</option>
                                <?php
                                foreach ($flight as $time) {
                                    ?>
                                    <option><?php echo $time['DEPART_TIME']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Seat(s)</label>
                            <p>Please write multiple seat numbers seperated by comma (,)</p>
                            <input class="form-control" type="text" name="seat" id="seat"/>
                        </div>
                        <br/>
                        <div class="form-group">
                            <input type="submit" class="btn btn-default" id="proceedd" name="proceed" value="Proceed"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d56267033.511953264!2d9.1442329265509!3d30.598226232246738!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1492214122002" frameborder="0" style="border:0; width: 100%; height: 600px" allowfullscreen></iframe>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="row" style="margin-left: 5px">
                    <div class="col-md-12">
                        <img src="images/cockpit.jpg" alt="offset" class="img-responsive"/>
                    </div>
                </div>
                <div class="row" style="margin-left: 5px">
                    <div class="col-md-12">
                        <table style="width:100%; border: 4px solid; border-bottom: 0px; border-top: 0px">
                            <thead>
                                <tr id="seatRows">
                                    <th colspan="8">Economay Class</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody style="width:100%">
                                <tr id="seatRows">
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">EA1</button> </td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">EA2</button> </td>
                                    <td id="ecoCorridor"></td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">EA3</button> </td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">EA4</button> </td>
                                    <td id="ecoCorridor"></td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">EA5</button> </td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">EA6</button> </td>
                                </tr>
                                <tr id="seatRows">
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">EB1</button> </td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">EB2</button> </td>
                                    <td id="ecoCorridor"></td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">EB3</button> </td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">EB4</button> </td>
                                    <td id="ecoCorridor"></td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">EB5</button> </td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">EB6</button> </td>
                                </tr>
                                <tr id="seatRows">
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">EC1</button> </td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">EC2</button> </td>
                                    <td id="ecoCorridor"></td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">EC3</button> </td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">EC4</button> </td>
                                    <td id="ecoCorridor"></td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">EC5</button> </td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">EC6</button> </td>
                                </tr>
                                <tr id="seatRows">
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">ED1</button> </td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">ED2</button> </td>
                                    <td id="ecoCorridor"></td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">ED3</button> </td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">ED4</button> </td>
                                    <td id="ecoCorridor"></td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">ED5</button> </td>
                                    <td id="ecoSeatCol"> <button type="button" class="btn btn-default" id="ecoSeat">ED6</button> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" style="margin-left: 5px">
                    <div class="col-md-12">
                        <table style="width:100%; border: 4px solid; border-top: 0px">
                            <thead>
                                <tr id="seatRows">
                                    <th colspan="11">Business Class</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody style="width:100%">
                                <tr id="seatRows">
                                    <td id="busSeatCol"> <button type="button" class="btn btn-default" id="busSeat">BA1</button> </td>
                                    <td id="busSeatCol"> <button type="button" class="btn btn-default" id="busSeat">BA2</button> </td>
                                    <td id="busSeatCol"> <button type="button" class="btn btn-default" id="busSeat">BA3</button> </td>
                                    <td id="busCorridor"></td>
                                    <td id="busSeatCol"> <button type="button" class="btn btn-default" id="busSeat">BA4</button> </td>
                                    <td id="busSeatCol"> <button type="button" class="btn btn-default" id="busSeat">BA5</button> </td>
                                    <td id="busSeatCol"> <button type="button" class="btn btn-default" id="busSeat">BA6</button> </td>
                                    <td id="busCorridor"></td>
                                    <td id="busSeatCol"> <button type="button" class="btn btn-default" id="busSeat">BA7</button> </td>
                                    <td id="busSeatCol"> <button type="button" class="btn btn-default" id="busSeat">BA8</button> </td>
                                    <td id="busSeatCol"> <button type="button" class="btn btn-default" id="busSeat">BA9</button> </td>
                                </tr>
                                <tr id="seatRows">
                                    <td id="busSeatCol"> <button type="button" class="btn btn-default" id="busSeat">BB1</button> </td>
                                    <td id="busSeatCol"> <button type="button" class="btn btn-default" id="busSeat">BB2</button> </td>
                                    <td id="busSeatCol"> <button type="button" class="btn btn-default" id="busSeat">BB3</button> </td>
                                    <td id="busCorridor"></td>
                                    <td id="busSeatCol"> <button type="button" class="btn btn-default" id="busSeat">BB4</button> </td>
                                    <td id="busSeatCol"> <button type="button" class="btn btn-default" id="busSeat">BB5</button> </td>
                                    <td id="busSeatCol"> <button type="button" class="btn btn-default" id="busSeat">BB6</button> </td>
                                    <td id="busCorridor"></td>
                                    <td id="busSeatCol"> <button type="button" class="btn btn-default" id="busSeat">BB7</button> </td>
                                    <td id="busSeatCol"> <button type="button" class="btn btn-default" id="busSeat">BB8</button> </td>
                                    <td id="busSeatCol"> <button type="button" class="btn btn-default" id="busSeat">BB9</button> </td>
                                </tr>
                            </tbody>
                        </table>
                        <br/>
                        
                        <div class="row">
                            <div class="col-md-10">
                                
                            </div>
                            <div class="col-md-2">
                                
                                
                               <!-- <button type="submit" class="btn btn-default">Submit</button>!-->
                            </div>
                        </div>
                            
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
