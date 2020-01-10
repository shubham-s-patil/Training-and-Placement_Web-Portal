
<?php
session_start();
error_reporting(0);
     $conn=mysqli_connect("localhost", "root", "", "viit_db");
	 if(!$conn)
	 {
		die('error connecting to database') ;
	 }
         // or die("Failed to connect mysql server " .mysqli_connect_error());
else{
		 echo 'you have connected succesfully';
    }
	
	 $eid=$_SESSION['elogin'];
     $ret=mysqli_query($conn,"select * from student where grno='$eid'");
     $num=mysqli_fetch_array($ret); 
     $name=$num['name'];
	 $department=$num['department'];
	 $rollno=$num['rollno'];
	 $grno=$num['grno'];
	 $shift=$num['shift'];
	 $address = mysqli_real_escape_string($conn, $_POST['address']);
	 $comp_name = mysqli_real_escape_string($conn, $_POST['comp_name']);
	 $package = mysqli_real_escape_string($conn, $_POST['package']);
     

     $query = "INSERT INTO placement(department, rollno, grno, name , shift,address, comp_name, package)
                VALUES ('$department', '$rollno', '$grno', '$name', '$shift','$address', '$comp_name', '$package')";

     if(!mysqli_query($conn, $query))
     {
         echo "Error" .mysqli_error($conn);
     }
     else
     {
        header("Location: ../placements.php");
     }
?>
