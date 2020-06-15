<?php 
require_once("crud.php");
$crudobj=new crud();

$resultArr=$crudobj->getAllComp();
?>





<html lang="en">
<head>
  <title>Competiton Details</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">Modern College Competition Portal</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="home.php">Home</a></li> <li class="active"><a href="comp_details.php">Competition Details</a></li>
      <li><a href="compresult.php">Winners</a></li>
     
      <li><a href="contactus.html">About Us</a></li>
      
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="studentdetailV2.php"><span class="glyphicon glyphicon-user"></span> Student Registration </a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>
    </ul>

  </div>
</nav>



<div class="well" style="background-color:		plum;">
<h1 class="text-info "><b>Competiton Details</b>
</h1>
</div>
<div class="container-fluid">

    <div  style="background-color:lavender;">
      <div class="well">
      	<p id="demo"></p>
        <h1 class="text-info "><b>Competition Information</b></h1>

        <table class="table table-striped table-bordered">
  
  <h3 class="text-center">Competition List</h3>
  <tr>
    <th>Competition Name</th>
    <th>Criteria</th>
    <th>Fees</th>
    <th>Date</th>
    <th>Time</th>
    <th>Venue</th>
    <th>Co-ordinater Name</th>
    <th>action</th>
   
  </tr>
<?php foreach ($resultArr as $key => $value) {
		?>
		<tr>
			<td><?php echo $value['comp_name'];?></td>
			<td><?php echo $value['criteria'];?></td>
			<td><?php echo $value['Fees'];?></td>
			<td><?php echo $value['c_date'];?></td>
			<td><?php echo $value['time'];?></td>
			<td><?php echo $value['c_venue'];?></td>
			<td><?php echo $value['co_ord'];?></td>
			<td><a href="studentdetailV2.php"><input type="button" class="btn btn-success" value="Participate"> </a>
			</tr>

				<?php }
	?>

</table>


  </div>
</div>



</body>
</html>








