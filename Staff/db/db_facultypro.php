
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

     $facultyname = mysqli_real_escape_string($conn, $_POST['facultyname']);
     $department = mysqli_real_escape_string($conn, $_POST['department']);
     $datefrom = mysqli_real_escape_string($conn, $_POST['datefrom']);
     $dateto = mysqli_real_escape_string($conn, $_POST['dateto']);
	 $days = mysqli_real_escape_string($conn, $_POST['days']);
	 $compname = mysqli_real_escape_string($conn, $_POST['compname']);
	 $attended = mysqli_real_escape_string($conn, $_POST['attended']);
     

     $query = "INSERT INTO faculty_training(facultyname,department,datefrom,dateto,days,compname,attended)
                VALUES ('$facultyname', '$department', '$datefrom', '$dateto', '$days', '$compname', '$attended')";

     if(!mysqli_query($conn, $query))
     {
         echo "Error" .mysqli_error($conn);
     }
     else
     {
        header("Location: ../login.html");
     }
?>