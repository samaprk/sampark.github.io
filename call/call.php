<?php
session_start();
setcookie("roomId",$_POST['roomId']);
?>

<!doctype html>
<html lang="en">
  <head>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script type="text/javascript" src="http://34.72.4.230:8080/socket.io/socket.io.js"></script>
  <script type="text/javascript" src="../js/mediasoup-client.min.js"></script>
  <script type="text/javascript" src="../js/app.js"></script>

	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/basic.css">
    <title>Call page</title>
  </head>
  <body>
    
    <div id="header" class="row px-2 shadow">
      <img src="assets/images/logo.png" style="width: 50%;">
    </div>
    <div id="feature" class="row d-flex justify-content-between align-items-center px-2">
      <h5>Room ID: <span id="roomid">
        <?php
          echo $_POST[roomId];
        ?>
      </span></h5>
      <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
          <button id="btnGroupDrop1" style="border-radius: 20px 0 0 20px" type="button" class="btn btn-danger shadow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-heart"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <a class="dropdown-item" href="#">:)</a>
            <a class="dropdown-item" href="#">XD</a>
          </div>
        </div>
        <div class="btn-group" role="group">
          <button id="btnGroupDrop1" style="border-radius: 0 20px 20px 0" type="button" class="btn btn-info shadow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-gamepad"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <a class="dropdown-item" href="#">Dots</a>
            <a class="dropdown-item" href="#">Tic-tac-toe</a>
          </div>
        </div>
      </div>
    </div>



    <div id="call-active" class="row">

    </div>



    <div class="button-grp px-2">
      <div class="row">
        <button type="button" class="btn btn-light shadow"><i class="fas fa-microphone"></i></button>
        <button type="button" class="btn btn-light shadow"><i class="fas fa-video"></i></button>
        <button type="button" class="btn btn-danger shadow"><i class="fas fa-phone" style="transform: rotate(225deg);"></i></button>
      </div>
      <div class="row">
        <button type="button" class="btn btn-light shadow"><i class="fas fa-comments"></i></button>
        <button type="button" class="btn btn-light shadow"><i class="fas fa-desktop"></i></button>
        <button type="button" class="btn btn-light shadow"><i class="fas fa-ellipsis-h"></i></button>
      </div>
      <div id="float"></div>
    </div>
    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- <script src="assets/js/action.js"></script> -->
  </body>
</html>
