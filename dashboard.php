<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
	<!-- Tags for video video conferencing shifted to call.php-->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!--link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"-->
	<link rel="stylesheet" href="home/css/home.css">

    <title>Home Page</title>
  </head>

<!-- The call elements come here and video tags are added to tag with id="container"
	those elements are there in call.html -->

  <body>
	<div id="container"></div> <!-- Videos will appear here if not redirected to call.html-->
	<div id="header" class="row px-2 shadow">
        <img src="home/images/logo.png" style="width: 50%;">
	</div>

    <div class="logged">
	<h2 class="mx-2 my-4">Hello <span>
		<?php
			echo($_SESSION['username']);
			setcookie("username",$_SESSION['username']);
		?>
	</span>!!</h1>
	<div class="d-flex bd-highlight mb-3">
		<a href="room/joinRoom.php" class="btn btn-success p-2 bd-highlight" role="button">Join</a>
		<a href="room/createRoom.php" class="btn btn-success p-2 bd-highlight mx-2" role="button">Create Room</a>
		<a href="index.php" class="btn btn-light ml-auto p-2 bd-highlight" role="button">Logout</a>
	</div>
	<div class="row pl-4 py-2" style="background: #EB9FEF">
		<h5>Recents</h5>
	</div>
	
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  </body>
</html>

