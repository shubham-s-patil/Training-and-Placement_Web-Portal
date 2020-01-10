
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
     $rollno = mysqli_real_escape_string($conn, $_POST['rollno']);
	 $password1 = mysqli_real_escape_string($conn, $_POST['password']);
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $department = mysqli_real_escape_string($conn, $_POST['department']);
     $year = mysqli_real_escape_string($conn, $_POST['year']);
     $division = mysqli_real_escape_string($conn, $_POST['division']);
	 $gender = mysqli_real_escape_string($conn, $_POST['gender']);
	 $dob = mysqli_real_escape_string($conn, $_POST['dob']);
	 $mob = mysqli_real_escape_string($conn, $_POST['mob']);
	 $address = mysqli_real_escape_string($conn, $_POST['address']);
     $profile1 = mysqli_real_escape_string($conn, $_FILES['profile']['name']);
	 $status=1;
	 
	 $extension = substr($profile1,strlen($profile1)-4,strlen($profile1));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.


	 $profile=md5($profile1).$extension;
     move_uploaded_file($_FILES["profile1"]["tmp_name"],"userimages/".$profile);
  
	 $password = md5($password1);

     $query = "INSERT INTO student(name, grno,rollno, password , email, department, year, division, gender, dob, mob, address ,profile,status)
                VALUES ('$name',  '$grno','$rollno', '$password', '$email', '$department', '$year', '$division', '$gender', '$dob', '$mob', '$address','$profile','$status')";

     if(!mysqli_query($conn, $query))
     {
         echo "Error" .mysqli_error($conn);
     }
     else
     {
        header("Location: ../login.php");
     }

	

?>
