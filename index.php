<!DOCTYPE html>
<html lang="en">
<head>
  <title>GEO HOME COOKING</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">TED CORPORATION</a>
      </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
          <li><a>About us</a></li>
        </ul>  
	<ul class="nav navbar-nav navbar-right">
	  <li><a href="registration.php#tabs-signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	  <li><a href="registration.php#tabs-login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	</ul>
    </div>
  </nav>
<div class="container">
  <div class="jumbotron" align="center">
    <h1><font color="CadetBlue">Geo<span class="glyphicon glyphicon-home"></span> Cooking</font></h1>
    <p>Don't waste your time to cook. Just search, enjoy eating and Done !</p> 
  </div>
  <div class="row">
    <div class="col-sm-4" align ="center">
      <h3><div align="center">Share your meal</div></h3>
	<form action=main.php method="post">
	  <table class="table">
	   <tbody>
	    <tr>
	      <td>Meal name: </td>
	      <td><input type="text" name="meal_name"></td>
	    </tr>
	    <tr>
	      <td>Description: </td>
	      <td><input type="text" name="desc"></td>
	    </tr>
	    <tr>
	      <td>Location: </td>
	      <td> <input type="text" name="location"></td>
	    </tr>
	   </tbody>
	  </table>
	    <div align="center">
	      <input type="submit" value="Submit"></button>
	      <input type="reset"></button>
	    </div>
	</form>
    </div>
    <div class="col-sm-4" align="center">
      <h3>Search your meal</h3>
	<form action=map.php method="post">
	  <p>Enter Zip code</p>
	  <p>
	    <input type="number" name="zipcode" min="10000" max="99999">
	    <input type="submit" value="OK">
	  </p>
    </div>
    <div class="col-sm-4" align="center">
      <h3>Sellers meet Buyers</h3>        
      <p>I am a seller</p>
      <p>I am a buyer</p>
    </div>
  </div>
  <br>
    <div class="jumbotron" align="center">
      <div class="row">
        <div class="col-sm-4" align="center">
          <p><img src="http://megaicons.net/static/img/icons_sizes/27/89/512/metroui-other-search-icon.png" class="img-rounded" alt"Searching" width=150px height=150px ></p>
        </div>
        <div class="col-sm-4" align="center">
          <p><img src="http://www.siteslab.org/cwcon/2014/sites/default/files/public/dining.png" class="img-rounded" alt"Eating" width=150px height=150px ></p>
        </div>
        <div class="col-sm-4" align="center">
          <p><img src="http://www.bizbuysell.com/brokerdirectory/images/icons/hands.png" class="img-rounded" alt"Buyer and Seller" width=150px height=150px ></p>
        </div>
      </div>
    </div>
</div>

</body>
</html>



<html>
<body>
<!--
<form action=main.php method="post">
Meal Name: <input type="text" name="meal_name"><br>
Description: <input type="text" name="desc"><br>
Location: <input type="text" name="location"><br>
<input type="submit">
</form>
-->

<//error_reporting(E_ALL);
require 'db/connect.php';>
</body>
</html>

