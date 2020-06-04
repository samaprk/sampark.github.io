<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/basic.css">
    <title>Create Room page</title>
   
  </head>
  <body>
    
    <div id="header" class="row px-2 shadow">
      <img src="assets/images/logo.png" style="width: 50%;">
    </div>

    <form method="post" action="../call/call.php">
        <div class="form-group">
          <label>Meeting Type</label>
          <select class="form-control">
            <option selected>Informal</option>
            <option>Formal</option>
            <option>Classroom</option>
            <option>Custom</option>
          </select>
        </div>	
        <div id="gen" class="btn btn-info">Generate</div>
        <div id="dispay">23424</div>
        <button role="button" type="submit" class="btn btn-primary mt-3" name="submit" style="color:white">Start Room</button>	
    </form>

    
    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
      var height = document.documentElement.clientHeight;
      console.log(height);

      $("form").css("margin-top",0.1*height);

      $("#gen").click(function(){
        var min = 100000;
        var max = 999999;
        var rand = Math.floor(Math.random()* (max - min + 1)) + min;
        console.log(rand);
        $("#display").text("14413");
      }); 
    </script>

  </body>
</html>