<?php 
require_once("crud.php");
$crudobj=new crud();
if(isset($_POST['submit'])&&$_POST['submit']=="Submit")
{
	if($_POST["fname"]==""||$_POST["lname"]==""||$_POST["address"]==""||$_POST["dob"]==""||$_POST["age"]==""||$_POST["mobile"]==""||$_POST["batch"]==""||$_POST["fees"]=="")
	{
		echo "fill out everything";
	}
	else{

		echo "<script>
         $(window).load(function(){
             $('#thankyouModal').modal('show');
         });
    </script>";

	
	$crudobj->insert($_POST);
	$id=$crudobj->id;
	
	header("location:viewresult.php?id=$id");
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
      <li class="active"><a href="compresult.php">Winners</a></li>
     
      <li><a href="contactus.html">About Us</a></li>
      
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="studentdetailV2.php"><span class="glyphicon glyphicon-user"></span> Student Registration </a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>
    </ul>

  </div>
</nav>
<div class="well" style="background-color:lavender;">
<h1 class="text-info "><b>Student Information</b>
</h1>
</div>
<div class="container-fluid">
  <div class="row">
   <!-- <div class="col-sm-4"></div>--><!--style="background-color:lavender;"-->
    <div class="col-sm-6" style="background-color:lavenderblush;">
      
      <form action="" method="POST" enctype="multipart/form-data" id="user" onsubmit="return validate();" ><!--starting of the from-->
        <div class="form-group">
          <div class="col-sm-12">
            <label class="label-control">First Name</label>
            <input type="text" name="fname" class="form-control" id="firstname" required="required">
            <p id="p1"></p>
          </div>
          <div class="col-sm-12">
        <label class="label-control">Last Name</label>
        <input type="text" name="lname" class="form-control" id="lastname" required="required">
        <p id="p2"></p>
      </div>

      <div class="col-sm-12">
        <label class="label-control">Address</label>
        <input type="textfield" name="address" class="form-control" id="address" required="required">
        <p id="p3"></p>
      </div>
        </div>

        <div class="form-group clearfix">
      <div class="col-sm-12">
        <label class="label-control">Birth Date</label>
        <input type="date" name="dob" class="form-control" id="birth_date" required="required">
        <p id="p4"></p>
      </div>
      <div class="col-sm-12">
        <label class="label-control">Age</label>
        <input type="number" name="age" class="form-control" id="student_age" required="required">
        <p id="p5"></p>
      </div>
      <div class="col-sm-12">
        <label class="label-control">Mobile</label>
        <input type="phone" name="mobile" class="form-control" id="mobile" required="required">
        <p id="p6"></p>
      </div>
    </div>
    <div class="form-group clearfix">
      <div class="col-sm-12"><!--code for the gender-->
        <label class="label-control">Gender</label>&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="gender" class="form-check-input" value="Male" checked><b>Male</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="gender" class="form-check-input" value="Female" ><b>Female</b>
      </div>
      <div class="col-sm-12"><!--code for the dropdwn of the batch name-->
        <label class="label-control">Batch</label>
        <select class="form-control" name="batch" required="required">
          <option value="Quiz">Quiz</option>
          <option value="C programming ">C programming </option>
          <option value="Hackthon">Hackthon</option>
          <option value="Debate">Debate</option>
          <option value="Poster">Poster</option>
          <option value="Project Competition">Project Competition</option>
        </select>
      </div>
      <div class="col-sm-12">
        <label class="label-control">Fees</label>
        <input type="text" name="fees" class="form-control" id="fees" required="required">
        <p id="p7"></p>
      </div>
      <div class="col-sm-12">
        <label class="label-control">Profile Picture</label>
        <input type="file" class="form-control-file" accept="image/*" name="profilepic" required="required">
      </div>
    </div>
<div class="form-group clearfix text-center">
      <input type="submit" value="Submit" name="submit"  class="btn btn-primary" style="margin-top: 15px;" >
      </div>
</form>
    </div><!--col-sm-8 vali-->
    <div class="col-sm-6" style="background-color:lavender;">
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
   
  </tr>
<?php foreach ($resultArr as $key => $value) {
		?>
		<tr>
			<td><?php echo $value['comp_name'];?></td>
			<td><?php echo $value['criteria'];?></td>
			<td><?php echo $value['Fees'];?></td>
			<td><?php echo $value['c_date'];?></td>
			</tr>

				<?php }
	?>

</table>


    </div>
  </div>
</div>


<div class="modal fade" id="thankyouModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Thank you for pre-registering!</h4>
            </div>
            <div class="modal-body">
                <p>Thanks for getting in touch!</p>                     
            </div>    
        </div>
    </div>
</div>

</body>
</html>



<script type="text/javascript">

	function validate()
	{
		var name_regex=/^[a-zA-Z]+$/;
		var add_regex=/^[0-9a-zA-Z]+$/;
		var fees_regex=/^\d+$/;
		var ph=/^[780][0-9]{9}$/;
		var fname=$('#firstname');
		var lname=$('#lastname');
		var address=$('#address');
		var fees=$('#fees').val();
		var mobile=$('#mobile').val();
		var age=$('#student_age').val();
		var birth_date=$("#birth_date").val();
		var flag=0;



		document.getElementById("p1").innerHTML="hiii";
		document.getElementById("p2").innerHTML="";
		document.getElementById("p3").innerHTML="";
		document.getElementById("p4").innerHTML="";
		document.getElementById("p5").innerHTML="";
		document.getElementById("p6").innerHTML="";
		document.getElementById("p7").innerHTML="";


		if(fname=="")
		{document.getElementById("p1").innerHTML="hii";
			$('#p1').text("*First Name must be Filled out*");
			$("#firstname").focus();
			flag=1;

		}else if(!fname.match(name_regex))
		{
			$('#p1').text("*First Name must contain alphabet*");
			$("#firstname").focus();
			flag=1;
		}


		if(lname=="")
		{
			$('#p2').text("*Last Name must be Filled out*");
			$("#lastname").focus();
			flag=1;

		}else if(!lname.match(name_regex))
		{
			$('#p2').text("*Last Name must contain alphabet*");
			$("#lastname").focus();
			flag=1;
		}

		if(address=="")
		{
			$('#p3').text("*Address must be Filled out*");
			flag=1;
			
		}else if(!address.match(add_regex))
		{
			$('#p3').text("*Address must contain alphabet*");
			$("#address").focus();
			flag=1;
		}


		if(fees=="")
		{
			$('#p7').text("*Fees must be Filled out*");
			flag=1;
		}else if(!fees.match(fees_regex))
		{
			$('#p7').text("*Fees must contains number*");
			$("#fees").focus();
			flag=1;
		}


		if(mobile=="")
		{
			$('#p6').text("*mobile must be Filled out*");
			flag=1;
		}else if(!mobile.match(ph))
		{
			$('#p6').text("*mobile must contains number*");
			$("#mobile").focus();
			flag=1;
		}

		if(age =="")
		{

			$('#p5').text("*age must be Filled out*");
			flag=1;
		}else if(!age.match(fees_regex))
		{
			$('#p5').text("*mobile must contains number*");
			$("#student_age").focus();
			flag=1;
		}
		if(birth_date=="")
		{

			$('#p4').text("*birth must be Filled out*");
			flag=1;
		}


		if(flag == 1)
		{
		
			return false;
		}
		else
		{
			return true;
		}

	}
</script>








