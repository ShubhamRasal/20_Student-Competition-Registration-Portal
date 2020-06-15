<?php
require_once("crud.php");
$id=$_GET['id'];
if($id!=1)
{
	header("location:pagenotfound.php");
  
}
$crudobj=new crud;
if(isset($_POST['fname'])&&$_POST['fname']!=NULL)
{
	$fName=$_POST['fname'];
}
else
{
	$fName="";
}
$resultArr=$crudobj->getAllStudent($fName);
$resultArr_winner=$crudobj->getresult();
$resultArr_comp=$crudobj->getAllComp();
?>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		</head>
<title>Student List</title>
<body>
	<div style=" height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
   left: 0;
  background-color: skyblue;">
		<form action="" method="POST">
			<div class="form-group clearfix">
				<div class="col-sm-8">
					<label class="label-control text-danger">First Name:</label>
					<input type="text" name="fname" class="form-control fname1">
				</div>
				<div class="row form-group clearfix" style="margin-top:20px;">
					
				<input type="submit" class="btn btn-info col-sm-2 form-control" name="submit" value="search" onclick="search()">
			</div>
					</div>
	</form><!--ending of the form--->
					<div class="col-sm-13">
						<a href="studentdetailV2.php" class="btn btn-success " style="margin-top:20px;">New Student</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     
						<a href="studentlist.php" class="btn btn-success " style="margin-top:20px;">Add Competition</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

						<a href="addwinner.php" class="btn btn-success " style="margin-top:20px;">Add Winner</a><br>
					<br>
						<div class="container-fluid">
<table class="table table-striped table-bordered" >
	
	<h3 class="text-center">Winners</h3>
	<tr>
		<th>Student Name</th>
		<th>Class</th>
		<th>Competition Name</th>
		<th>Rank</th>
		<th>Score</th>
	</tr>

	<?php foreach ($resultArr_winner as $key => $value) {
		?>
		<tr>
			<td><?php echo $value['stud_name']?></td>
			<td><?php echo $value['stud_class'];?></td>
			<td><?php echo $value['comp_name'];?></td>
			<td><?php echo $value['comp_rank'];?></td>
			<td><?php echo $value['comp_score'];?></td>
		</tr>
		<?php }
	?>

</table>
<br>
<br>


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
   
  </tr>
<?php foreach ($resultArr_comp as $key => $value) {
		?>
		<tr>
			<td><?php echo $value['comp_name'];?></td>
			<td><?php echo $value['criteria'];?></td>
			<td><?php echo $value['Fees'];?></td>
			<td><?php echo $value['c_date'];?></td>
			<td><?php echo $value['time'];?></td>
			<td><?php echo $value['c_venue'];?></td>
			<td><?php echo $value['co_ord'];?></td>
			</tr>

				<?php }
	?>

</table>


					</div>




</div>
<div style="height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px; right: 0;
  background-color: #ADD8E6;">
  <a href="home.php" class="btn btn-danger" style="margin-top:20px;">Logout</a><br>
<table class="table table-striped table-bordered">
	
	<h3 class="text-center">Student Details</h3>
	<tr>
		<th>Student Name</th>
		<th>Gender</th>
		<th>Address</th>
		<th>Mobile</th>
		<th>Competition</th>
		<th>Fees</th>
		<th>action</th>
	</tr>
	
	<?php foreach ($resultArr as $key => $value) {
		?>
		<tr>
			<td><?php echo $value['fname']." ".$value['lname'];?></td>
			<td><?php echo $value['gender'];?></td>
			<td><?php echo $value['address'];?></td>
			<td><?php echo $value['mobile'];?></td>
			<td><?php echo $value['batch'];?></td>
			<td><?php echo $value['fees'];?></td>
			<td><a href="updatestudentdetails.php?id=<?php echo htmlspecialchars($value['id']);?>" class="btn btn-warning">Update</a>
				<a href="viewresult.php?id=<?php echo htmlspecialchars($value['id']);?>" class="btn btn-info">View Student</a>
			</td>
					</tr>
		<?php }
	?>

</table>
</div>
</body>
</html>

