
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

     $department = mysqli_real_escape_string($conn, $_POST['department']);
     $industry_name = mysqli_real_escape_string($conn, $_POST['industry_name']);
     $program = mysqli_real_escape_string($conn, $_POST['program']);
     $projdomain = mysqli_real_escape_string($conn, $_POST['projdomain']);
	 $noofproj = mysqli_real_escape_string($conn, $_POST['noofproj']);
	 $noofstud = mysqli_real_escape_string($conn, $_POST['noofstud']);
	 $nooffaculty = mysqli_real_escape_string($conn, $_POST['nooffaculty']);
     

     $query = "INSERT INTO sponsored(department, industry_name,program, projdomain, noofproj, noofstud, nooffaculty)
                VALUES ('$department', '$industry_name', '$program', '$projdomain', '$noofproj', '$noofstud', '$nooffaculty')";

     if(!mysqli_query($conn, $query))
     {
         echo "Error" .mysqli_error($conn);
     }
     else
     {
        header("Location: ../login.html");
     }
?>