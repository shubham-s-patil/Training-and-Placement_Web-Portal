
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
	 $password1 = mysqli_real_escape_string($conn, $_POST['password']);
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $department = mysqli_real_escape_string($conn, $_POST['department']);
     $year = mysqli_real_escape_string($conn, $_POST['year']);
     $division = mysqli_real_escape_string($conn, $_POST['division']);
	 $gender = mysqli_real_escape_string($conn, $_POST['gender']);
	 $dob = mysqli_real_escape_string($conn, $_POST['dob']);
	 $mob = mysqli_real_escape_string($conn, $_POST['mob']);
	 $address = mysqli_real_escape_string($conn, $_POST['address']);
     $profile = mysqli_real_escape_string($conn, $_POST['profile']);
	 $status=1;
	 
	 $password = md5($password1);

     $query = "INSERT INTO student(name, grno, password , email, department, year, division, gender, dob, mob, address ,profile,status)
                VALUES ('$name',  '$grno', '$password', '$email', '$department', '$year', '$division', '$gender', '$dob', '$mob', '$address','$profile','$status')";

     if(!mysqli_query($conn, $query))
     {
         echo "Error" .mysqli_error($conn);
     }
     else
     {
        header("Location: ../login.php");
     }
	
	

?>
