<?php
require_once("crud.php");
$id=$_GET['id'];

if($id)
{
    $crudobj=new crud;
    $resultArr=$crudobj->view($id);
    $resultArr_comp=$crudobj->getAllComp();
}
?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
     
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
.fa {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}
.fa-facebook {
  background: #3B5998;
  color: white;
}
.fa-linkedin {
  background: #007bb5;
  color: white;
}
</style>

    </head>
    <title>student information</title>
    <body>
        <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Modern Colloge Competition Portal</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="#">Home</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="studentdetailV2.php"><span class="glyphicon glyphicon-user"></span> Student Registration </a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>
    </ul>

  </div>
</nav>
         <div class="row">
      <div class="col-sm-6" style="background-color:lavenderblush;">
      
        <div class="clearfix">&nbsp;</div>
        <div class="col-sm-12 text-center">
        <table class="table table-striped table-bordered table-hover table-responsive" style="background-color:skyblue;>
            <h2 style="float:left;width:100%"><b>Student Details</b></h2>
            <!--<a href="studentlist1.php" class="btn btn-primary"style="margin-top:15px;">Manage Student</a>-->
            <tr>
                <th>Profile pic</th>
                <td><img src="<?php echo $resultArr['profilepic'];?>"height="100px"></td>
            </tr>
            <tr>
                <th>Student name</th>
                <td><?php echo $resultArr['fname']." ".$resultArr['lname'];?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?php echo $resultArr['gender'];?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo $resultArr['address'];?></td>
            </tr>
            <tr>
                <th>Mobile Number</th>
                <td><?php echo $resultArr['mobile'];?></td>
            </tr>
            <tr>
                <th>Competition Name</th>
                <td><?php echo $resultArr['batch'];?></td>
            </tr>
            <tr>
                <th>Fees</th>
                <td><?php echo $resultArr['fees'];?></td>
            </tr>
        </table>
    </div>
</div>
<div class="col-sm-6" style="background-color:lavenderblush;">

<table class="table table-striped table-bordered">
<h3 class="text-center well ">Competition Details</h3>
  <tr>
    <th>Competition Name</th>
    <th>Date</th>
    <th>Time</th>
    <th>Venue</th>
   
  </tr>
<?php foreach ($resultArr_comp as $key => $value) {
        ?>
        <tr>
            <td><?php echo $value['comp_name'];?></td>
            <td><?php echo $value['c_date'];?></td>
            <td><?php echo $value['time'];?></td>
            <td><?php echo $value['c_venue'];?></td>
            </tr>

                <?php }
    ?>

</table>

</div>

</div>



 <div class="row" style="background-color:  silver;" >
        <div class="col-sm-4 text-center">
            <h4 class="ft-text-title">Modern College of Arts,Science & Commerce</h4>
            <h6 class="ft-desp">Shivajinagar,Pune 411005</h6>
              <h5>  <br>College Contact Details </h5>
            
            <h4 class="details">
                <a class="contact" href="tel:+977-1-4107223">
                    <i class="fa fa-phone" aria-hidden="true"></i> +977-000000</a>
                </h4>
            </div>
            <div class="col-sm-4 text-center border-left">
                <h3 class="ft-text-title text-info"><b>Our Team</b></h3>
                <div class="address-member">
                    <h2 class="member text-success">
                        Team Member : Gauri Raskar
                    </h2>
                    <h2 class="member text-success">
                        Team Member : Shubham Rasal
                    </h2>
               </div>
           </div>
           <div class="col-sm-4 col-xs-12 text-center border-left">
            <h4 class="text-info">About</h4>
            <div class="">
                 <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-linkedin"></a>
                <br><br><br><br><br><br><br>
            </div>
        </div>
    </div>
  <div class="row ft-copyright pt-2 pb-2" style="padding-left: 25px; background-color:  silver;">
    <div class="col-sm-4 text-pp-crt">&copy copyright 2019 All  Rights Reserved</div>
    <div class="col-sm-4 text-pp-crt-rg">Department of Information Reg No :</div>
    <div class="col-sm-4 developer">
 
    </div>
  </div>

    </body>
</html>