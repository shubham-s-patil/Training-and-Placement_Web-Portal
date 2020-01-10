
<?php
     session_start();
     $conn=mysqli_connect("localhost", "root", "", "viit_db");
	 if(!$conn)
	 {
		die('error connecting to database') ;
	 }
         // or die("Failed to connect mysql server " .mysqli_connect_error());
else{
		 echo 'you have connected succesfully';
    }
     $name = mysqli_real_escape_string($conn, $_POST['name']);
	 $grno = mysqli_real_escape_string($conn, $_POST['grno']);
     $academic_year = mysqli_real_escape_string($conn, $_POST['academic_year']);
     $semester = mysqli_real_escape_string($conn, $_POST['semester']);
	 $comp_name = mysqli_real_escape_string($conn, $_POST['comp_name']);
	 $address = mysqli_real_escape_string($conn, $_POST['address']);
	 $city = mysqli_real_escape_string($conn, $_POST['city']);
	 $date_ = mysqli_real_escape_string($conn, $_POST['date_']);
	 $activity = mysqli_real_escape_string($conn, $_POST['activity']);
	 $description = mysqli_real_escape_string($conn, $_POST['description']);
	 $file1 = mysqli_real_escape_string($conn, $_POST['file1']);
	 $status=0;
     $isread=0;
     $msg = "";
	 $grno=$_SESSION['elogin'];
     
     $query = "INSERT INTO monitor(name,grno,academic_year, semester,comp_name , address, city , date_, activity, description,file1,status,isread)
                VALUES ('$name','$grno','$academic_year', '$semester', '$comp_name' , '$address', '$city', '$date_', '$activity', '$description','$file1','$status','$isread')";

     if(!mysqli_query($conn, $query))
     {
         $error="Something went wrong. Please try again";
     }
     else
     {
		$msg="Leave applied successfully";
        header("Location: ../monitoring.php");
     }
?>
