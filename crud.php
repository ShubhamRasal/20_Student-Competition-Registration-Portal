<?php 
require_once("db.php");
class crud 
{
    public $id;

public function insert($studentArr)
    {
        $fname=$studentArr['fname'];
        $lname=$studentArr['lname'];
        $address=$studentArr['address'];
        $mobile=$studentArr['mobile'];
        $age=$studentArr['age'];
        $dob=$studentArr['dob'];
        $gender=$studentArr['gender'];
        $std=$studentArr['batch'];
        $fees=$studentArr['fees'];
        $profile=$_FILES["profilepic"]["name"];
        $fileName=NULL;


        //print_r($studentArr);

        if(isset($_FILES['profilepic'])&& !empty($_FILES["profilepic"]["name"]))
        {
            $target_dir="uploads/";
            $imageFileType=pathinfo($_FILES["profilepic"]["name"],PATHINFO_EXTENSION);
            $allowedExtArr=array('gif','png','jpg','jpeg');

            if(!in_array($imageFileType,$allowedExtArr))
            {
                $errorMsg .="Please Select png,gif,jpg,jpef Files Only,";
            }
            if($profile)
            {
                $fileName="photo_".time().".".$imageFileType;
                $target_dir.=$fileName;
                if(!move_uploaded_file($_FILES["profilepic"]["tmp_name"],$target_dir))
                {
                    $errorMsg.="error in uploading filr,";
                }
            }
        }
     
       try{
        $sql='INSERT INTO student (fname,lname,gender,batch,address,mobile,age,dob,fees,profilepic) VALUES (:fname,:lname,:gender,:batch,:address,:mobile,:age,:dob,:fees,:profile)';
       $db=getDB();
       $result=$db->prepare($sql);
       var_dump($result);
        /*
        $sql="INSERT INTO `student`('fname','lname','gender','batch','address','mobile','age','dob','fees','profilepic') VALUES (:fname,:lname,:gender,:batch,:address,:mobile,:age,:dob,:fees,:profile,)";
        $result->bindParam("fna, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)me", $fname,PDO::PARAM_STR) ;
        $result->bindParam("lname", $lname,PDO::PARAM_STR) ;
        $result->bindParam("gender", $gender,PDO::PARAM_STR) ;
        $result->bindParam("batch", $batch,PDO::PARAM_STR) ;
        $result->bindParam("address", $address,PDO::PARAM_STR) ;
        $result->bindParam("mobile", $mobile,PDO::PARAM_STR) ;
        $result->bindParam("age", $age,PDO::PARAM_STR) ;
        $result->bindParam("dob", $dob,PDO::PARAM_STR) ;
        $result->bindParam("fees", $fees,PDO::PARAM_STR) ;
          $result->bindParam("profile", $target_dir,PDO::PARAM_STR) ;

         $result->execute();
*/


       $pdoresult=$result->execute(array(':fname'=>$fname,':lname'=>$lname ,':gender'=>$gender,':batch'=>$std,':address'=>$address,':mobile'=>$mobile,':age'=>$age,':dob'=>$dob,':fees'=>$fees,':profile'=>$target_dir));

               if($pdoresult)
               {
                   $lastid=$db->lastInsertId();
                   $this->id=$lastid;
               }
        } 
         catch (PDOException $e) 
        {
                echo 'Connection failed: ' . $e->getMessage();
          }

       
    }


    function getAllStudent($fName="")
    {
        $db=getDB();
        $sql="SELECT * FROM student";

        if($fName!="")
        {
        	
        	$sql.=" where fname LIKE '%fName%'";
        }
        else
        {
        	$sql.=" where 1";
        }
        try{
        $recordset=$db->prepare($sql);
        $recordset->execute();
       $data=$recordset->fetchAll();
        #$data=$recordset->fetch(FETCH::ASSOC);
        	}
            catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
                }
           return $data;
    }// getAllStudents() closed



public function view($id)
    {
        $sql="SELECT * FROM `student` WHERE id=$id";
        $db=getDB();
        try{
        $result=$db->prepare($sql);
       // var_dump($result);

       // echo "<br><br>here";
        $pdoresult=$result->execute();
        
        $result=$result->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
                }
}


function getAllComp()
    {
        $db=getDB();
        $sql="SELECT * FROM competition";
        try{
        $recordset=$db->prepare($sql);
        $recordset->execute();
       $data=$recordset->fetchAll();
        #$data=$recordset->fetch(FETCH::ASSOC);
            }
            catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
                }
           return $data;
    }// getAllStudents() closed


 function getresult()
    {
        $db=getDB();
        $sql="SELECT * FROM winner";

        try{
        $recordset=$db->prepare($sql);
        $recordset->execute();
       $data=$recordset->fetchAll();
        #$data=$recordset->fetch(FETCH::ASSOC);
            }
            catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
                }
           return $data;
    }// getresult() closed


public function insertwinner($studentArr)
    {
        $stud_name=$studentArr['stud_name'];
        $stud_class=$studentArr['stud_class'];
        $comp_name=$studentArr['comp_name'];
        $comp_rank=$studentArr['comp_rank'];
        $comp_score=$studentArr['comp_score'];
        


        print_r($studentArr);

     
       try{
          $sql='INSERT INTO winner (stud_name,stud_class,comp_name,comp_rank,comp_score) VALUES (:stud_name,:stud_class,:comp_name,:comp_rank,:comp_score)';
       $db=getDB();
       $result=$db->prepare($sql);
       var_dump($result);
      
       $pdoresult=$result->execute(array(':stud_name'=>$stud_name,':stud_class'=>$stud_class ,':comp_name'=>$comp_name,':comp_rank'=>$comp_rank,':comp_score'=>$comp_score));

               if($pdoresult)
               {
                   $lastid=$db->lastInsertId();
                   $this->id=$lastid;
               }
        } 
         catch (PDOException $e) 
        {
                echo 'Connection failed: ' . $e->getMessage();
          }

       
    }








}// class closed
/*
$db1=getDB();
echo "in crud.php here i am<br><br>";
        $whereClause="";
        $sql="SELECT * FROM student";

        $recordset=$db1->prepare($sql);
        $recordset->execute();
 $data=$recordset->fetchAll();
        
print_r($data);
*/

       ?>
