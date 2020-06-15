<?php 
require_once("crud.php");
$crudobj=new crud();
if(isset($_POST['submit'])&&$_POST['submit']=="Login")
{
  $ret=$_POST['uname'];
  $ret1=$_POST['pwd'];
  
   $u_name="admin";
   $u_pass="admin";
if((strcmp($ret,$u_name)==0)&&(strcmp($ret1,$u_pass)==0))
{
   echo $ret;
   echo $ret1;

   header("location:studentlist.php?id=1");
}
  
}

$resultArr=$crudobj->getAllComp();
?>





<html lang="en">
<head>
  <title>Student Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">Modern Colloge Competition Portal</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="home.php">Home</a></li> <li ><a href="comp_details.php">Competition Details</a></li>
      <li ><a href="compresult.php">Winners</a></li>
     
      <li><a href="contactus.html">About Us</a></li>
      
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="studentdetailV2.php"><span class="glyphicon glyphicon-user"></span> Student Registration </a></li>
      <li class="active"><a ><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>
    </ul>

  </div>
</nav>
<div class="well" style="background-color:lavender;">
<h1 class="text-info text-center"><b>Admin Login</b>
</h1>
</div>
<div class="container-fluid">
  <div class="row">
   <div class="col-sm-3"></div><!--style="background-color:lavender;"-->
    <div class="col-sm-6" style="background-color:lavenderblush;">
      
      <form action="" method="POST" enctype="multipart/form-data" id="user" onsubmit="return validate();" ><!--starting of the from-->
        <div class="form-group">
          <div class="col-sm-12">
            <label class="label-control">Admin Username</label>
            <input type="text" name="uname" class="form-control" id="firstname" required="required">
            <p id="p1"></p>
          </div>
          <div class="col-sm-12">
        <label class="label-control">Password</label>
        <input type="password" name="pwd" class="form-control" id="pwd" required="required">
        <p id="p2"></p>
      </div>

<div class="form-group clearfix text-center">
      <input type="submit" value="Login" name="submit"  class="btn btn-primary" style="margin-top: 15px;" >
      </div>
</form>
   


</body>
</html>










