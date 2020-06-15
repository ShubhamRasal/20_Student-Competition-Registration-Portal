



<?php
require_once("crud.php");

$crudobj=new crud;
$resultArr=$crudobj->getresult();

?>
<html>

<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">h1 {
  text-decoration: underline overline dotted red;
}</style>
		</head>
<title>Result-page</title>
<body>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">Modern College Competition Portal</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="home.php">Home</a></li> <li ><a href="comp_details.php">Competition Details</a></li>
      <li class="active"><a href="compresult.php">Winners</a></li>
     
      <li><a href="contactus.html">About Us</a></li>
      
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="studentdetailV2.php"><span class="glyphicon glyphicon-user"></span> Student Registration </a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>
    </ul>

  </div>
</nav>
	
<div class="container-fluid">
<table class="table table-striped table-bordered">
	
	<h3 class="text-center">Winners</h3>
	<tr>
		<th>Student Name</th>
		<th>Class</th>
		<th>Competition Name</th>
		<th>Rank</th>
		<th>Score</th>
	</tr>

	<?php foreach ($resultArr as $key => $value) {
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
<h1 class="Display-1 text-center">Congratulations to All Winners</h1><h2 class="Display-1 text-center"> and Participated Students</h2>
</div>
</body>
</html>

