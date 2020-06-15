<?php 
require_once("crud.php");
$crudobj=new crud();
if(isset($_POST['submit'])&&$_POST['submit']=="Submit")
{
	if($_POST["stud_name"]==""||$_POST["stud_class"]==""||$_POST["comp_name"]==""||$_POST["comp_rank"]==""||$_POST["comp_score"]=="")
	{
		echo "<h1>fill out everything</h1>";
	}
	else{
	
	$crudobj->insertwinner($_POST);
	$id=$crudobj->id;
	//echo"<h1>successfull<h1>";
	header("location:studentlist.php");
	}
}

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
      <li><a href="home.php">Home</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="studentdetailV2.php"><span class="glyphicon glyphicon-user "></span> Student Registration </a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>
    </ul>

  </div>
</nav>




<div class="well" style="background-color:lavender;">
<h1 class="text-info "><b>Winner Information</b>
</h1>
</div>
<div class="container-fluid">
 
   <!-- <div class="col-sm-4"></div>--><!--style="background-color:lavender;"-->
    <div class="col-sm-6" style="background-color:lavenderblush;">
      
      <form action="" method="POST" enctype="multipart/form-data" id="user" onsubmit="return validate();" ><!--starting of the from-->
        <div class="form-group">
          <div class="col-sm-12">
            <label class="label-control">Name</label>
            <input type="text" name="stud_name" class="form-control" id="stud_name">
            <p id="p1"></p>
          </div>
           <div class="col-sm-12">
        <label class="label-control">Class</label>
        <input type="textfield" name="stud_class" class="form-control" id="stud_class">
        <p id="p3"></p>
      </div>

      <div class="col-sm-12"><!--code for the dropdwn of the batch name-->
        <label class="label-control">Competition Name</label>
        <select class="form-control" name="comp_name">
          <option value="Quiz">Quiz</option>
          <option value="C programming ">C programming </option>
          <option value="Hackthon">Hackthon</option>
          <option value="Debate">Debate</option>
          <option value="Poster">Poster</option>
          <option value="Project Competition">Project Competition</option>
        </select>
      </div>

      <div class="col-sm-12">
        <label class="label-control">Rank</label>
        <input type="number" name="comp_rank" class="form-control" id="comp_rank">
        <p id="p5"></p>
     
 <label class="label-control">Score</label>
        <input type="number" name="comp_score" class="form-control" id="comp_score">
        <p id="p5"></p>
      </div>
        </div> 
<div class="form-group clearfix text-center">
      <a href="mainpage.php"><input type="submit" value="Submit" name="submit"  class="btn btn-primary" style="margin-top: 15px;" ></a>
      </div>
    </div>


</form>
    </div><!--col-sm-8 vali-->
   
</body>
</html>











