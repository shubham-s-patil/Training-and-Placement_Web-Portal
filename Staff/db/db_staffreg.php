
<?php
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
     $email = mysqli_real_escape_string($conn, $_POST['email']);
	 $password = mysqli_real_escape_string($conn, $_POST['password']);
     $department = mysqli_real_escape_string($conn, $_POST['department']);
	 $gender = mysqli_real_escape_string($conn, $_POST['gender']);
	 $dob = mysqli_real_escape_string($conn, $_POST['dob']);
	 $mob = mysqli_real_escape_string($conn, $_POST['mob']);
	 $address = mysqli_real_escape_string($conn, $_POST['address']);
     $status=1;

     $query = "INSERT INTO teacher(name, email,password, department, gender, dob, mob, address,status)
                VALUES ('$name', '$email','$password','$department', '$gender', '$dob', '$mob', '$address','$status')";

     if(!mysqli_query($conn, $query))
     {
         echo "Error" .mysqli_error($conn);
     }
     else
     {
        header("Location: ../login.php");
     }
?>
